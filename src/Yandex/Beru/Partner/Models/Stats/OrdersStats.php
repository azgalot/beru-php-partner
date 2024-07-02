<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\ObjectModel;

class OrdersStats extends ObjectModel
{
    /**
     * @param array|object $orderStats
     *
     * @return OrdersStats
     */
    public function add($orderStats)
    {
        if (is_array($orderStats)) {
            $this->collection[] = new OrderStats($orderStats);
        } elseif (is_object($orderStats) && $orderStats instanceof OrderStats) {
            $this->collection[] = $orderStats;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return OrderStats[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return OrderStats
     */
    public function current(): mixed
    {
        return parent::current();
    }
}
