<?php

namespace WolfpackIT\softDelete\queries;

use WolfpackIT\softDelete\interfaces\SoftDeleteActiveQueryInterface;
use WolfpackIT\softDelete\traits\SoftDeleteActiveQueryTrait;
use yii\db\ActiveQuery;

/**
 * Class SoftDeleteActiveQuery
 * @package WolfpackIT\softDelete\queries
 */
class SoftDeleteActiveQuery extends ActiveQuery implements SoftDeleteActiveQueryInterface
{
    use SoftDeleteActiveQueryTrait;
}