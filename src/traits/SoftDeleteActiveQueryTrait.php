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
    public function notDeleted($alias = null): self
    {
        $column = is_null($alias)
            ? (new $this->modelClass())->deletedAtTableColumn()
            : ($alias ? $alias . '.' : '') . (new $this->modelClass())->deletedAtAttribute();
        return $this->andWhere([$column => null]);
    }

    /**
     * @return SoftDeleteActiveQuery
     */
    public function deleted($alias = null): self
    {
        $column = is_null($alias)
            ? (new $this->modelClass())->deletedAtTableColumn()
            : ($alias ? $alias . '.' : '') . (new $this->modelClass())->deletedAtAttribute();
        return $this->andWhere(['not', [$column => null]]);
    }
}