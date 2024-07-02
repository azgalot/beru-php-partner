<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\ObjectModel;

class PricesStats extends ObjectModel
{
    /**
     * @param array|object $priceStats
     *
     * @return PricesStats
     */
    public function add($priceStats)
    {
        if (is_array($priceStats)) {
            $this->collection[] = new PriceStats($priceStats);
        } elseif (is_object($priceStats) && $priceStats instanceof PriceStats) {
            $this->collection[] = $priceStats;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return PriceStats[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return PriceStats
     */
    public function current(): mixed
    {
        return parent::current();
    }
}
