<?php

namespace WolfpackIT\softDelete\traits;

use WolfpackIT\softDelete\queries\SoftDeleteActiveQuery;

/**
 * Class SoftDeleteActiveQueryTrait
 * @package WolfpackIT\softDelete\traits
 */
trait SoftDeleteActiveQueryTrait
{
    /**
     * @return SoftDeleteActiveQuery
     */
    public function notDeleted(): self
    {
        return $this->andWhere([(new $this->modelClass())->deletedAtTableColumn() => null]);
    }

    /**
     * @return SoftDeleteActiveQuery
     */
    public function deleted(): self
    {
        return $this->andWhere(['not', [(new $this->modelClass())->deletedAtTableColumn() => null]]);
    }
}