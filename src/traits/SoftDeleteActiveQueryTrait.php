<?php

namespace WolfpackIT\softDelete\traits;

use WolfpackIT\softDelete\interfaces\SoftDeleteActiveQueryInterface;
use WolfpackIT\softDelete\queries\SoftDeleteActiveQuery;

/**
 * Class SoftDeleteActiveQueryTrait
 * @package WolfpackIT\softDelete\traits
 */
trait SoftDeleteActiveQueryTrait
{
    /**
     * @return SoftDeleteActiveQueryInterface
     */
    public function notDeleted($alias = null): SoftDeleteActiveQueryInterface
    {
        $column = is_null($alias)
            ? (new $this->modelClass())->deletedAtTableColumn()
            : ($alias ? $alias . '.' : '') . (new $this->modelClass())->deletedAtAttribute();
        return $this->andWhere([$column => null]);
    }

    /**
     * @return SoftDeleteActiveQueryInterface
     */
    public function deleted($alias = null): SoftDeleteActiveQueryInterface
    {
        $column = is_null($alias)
            ? (new $this->modelClass())->deletedAtTableColumn()
            : ($alias ? $alias . '.' : '') . (new $this->modelClass())->deletedAtAttribute();
        return $this->andWhere(['not', [$column => null]]);
    }
}