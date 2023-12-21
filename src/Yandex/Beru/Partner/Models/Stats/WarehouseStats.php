<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\Model;

class WarehouseStats extends Model
{
    protected $id;
    protected $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
