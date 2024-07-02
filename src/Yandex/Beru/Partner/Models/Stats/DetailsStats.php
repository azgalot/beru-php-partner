<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\ObjectModel;

class DetailsStats extends ObjectModel
{
    /**
     * @param array|object $detail
     *
     * @return DetailsStats
     */
    public function add($detail)
    {
        if (is_array($detail)) {
            $this->collection[] = new PriceStats($detail);
        } elseif (is_object($detail) && $detail instanceof PriceStats) {
            $this->collection[] = $detail;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return DetailStats[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return DetailStats
     */
    public function current(): mixed
    {
        return parent::current();
    }
}
