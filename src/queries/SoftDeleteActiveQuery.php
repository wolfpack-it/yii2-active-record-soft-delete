<?php

namespace WolfpackIT\softDelete\queries;

use yii\db\ActiveQuery;

/**
 * Class SoftDeleteActiveQuery
 * @package WolfpackIT\softDelete\queries
 */
class SoftDeleteActiveQuery extends ActiveQuery
{
    /**
     * @return SoftDeleteActiveQuery
     */
    public function notDeleted(): self
    {
        return $this->andWhere([(new $this->modelClass())->deletedAtAttribute() => null]);
    }

    /**
     * @return SoftDeleteActiveQuery
     */
    public function deleted(): self
    {
        return $this->andWhere(['not', [(new $this->modelClass())->deletedAtAttribute() => null]]);
    }
}