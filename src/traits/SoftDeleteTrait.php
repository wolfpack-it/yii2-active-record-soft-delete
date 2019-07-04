<?php

namespace WolfpackIT\softDelete\traits;

use WolfpackIT\softDelete\queries\SoftDeleteActiveQuery;
use yii\db\StaleObjectException;

/**
 * Trait SoftDeleteTrait
 * @package WolfpackIT\softDelete\traits
 *
 * @property-read bool $isDeleted
 */
trait SoftDeleteTrait
{
    abstract public function afterDelete();

    abstract public function beforeDelete();

    /**
     * This function must return the attribute that is being set when the model is deleted.
     *
     * @return string
     */
    public function deletedAtAttribute(): string
    {
        return 'deleted_at';
    }

    /**
     * @return bool
     * @throws StaleObjectException
     */
    protected function deleteInternal(): bool
    {
        if (!$this->beforeDelete()) {
            return false;
        }

        // we do not check the return value of deleteAll() because it's possible
        // the record is already deleted in the database and thus the method will return 0
        $condition = $this->getOldPrimaryKey(true);
        $lock = $this->optimisticLock();
        if ($lock !== null) {
            $condition[$lock] = $this->$lock;
        }

        //We do nothing, it should be handled by the TimestampBehavior
        $result = $this->updateAttributes([$this->deletedAtAttribute()]);

        if ($lock !== null && !$result) {
            throw new StaleObjectException('The object being deleted is outdated.');
        }
        $this->setOldAttributes(null);
        $this->afterDelete();

        return $result;
    }

    /**
     * @return SoftDeleteActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public static function find(): SoftDeleteActiveQuery
    {
        return \Yii::createObject(SoftDeleteActiveQuery::class, [get_called_class()]);
    }

    /**
     * @return bool
     */
    public function getIsDeleted(): bool
    {
        return $this->{$this->deletedAtAttribute()} !== null;
    }

    abstract public function getOldPrimaryKey($asArray = false);

    abstract public function optimisticLock();

    abstract public function setOldAttributes($values);
}
