<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\Model;

class PriceStats extends Model
{
    protected $type;
    protected $costPerItem;
    protected $total;

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return double
     */
    public function getCostPerItem()
    {
        return $this->costPerItem;
    }
}
