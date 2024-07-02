<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\ObjectModel;

class OrderItemsStats extends ObjectModel
{
    /**
     * @param array|object $item
     *
     * @return OrderItemsStats
     */
    public function add($item)
    {
        if (is_array($item)) {
            $this->collection[] = new OrderItemStats($item);
        } elseif (is_object($item) && $item instanceof OrderItemStats) {
            $this->collection[] = $item;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return OrderItemStats[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return OrderItemStats
     */
    public function current(): mixed
    {
        return parent::current();
    }
}
