<?php

namespace WolfpackIT\softDelete\interfaces;

use yii\db\ActiveQueryInterface;

/**
 * Interface SoftDeleteActiveQueryInterface
 * @package WolfpackIT\softDelete\interfaces
 */
interface SoftDeleteActiveQueryInterface extends ActiveQueryInterface
{
    /**
     * @param null $alias
     * @return $this
     */
    public function deleted($alias = null): SoftDeleteActiveQueryInterface;

    /**
     * @param null $alias
     * @return $this
     */
    public function notDeleted($alias = null): SoftDeleteActiveQueryInterface;
}