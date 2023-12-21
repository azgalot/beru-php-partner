<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\ObjectModel;

class CommissionsStats extends ObjectModel
{
    /**
     * @param array|object $commission
     *
     * @return CommissionsStats
     */
    public function add($commission)
    {
        if (is_array($commission)) {
            $this->collection[] = new CommissionStats($commission);
        } elseif (is_object($commission) && $commission instanceof CommissionStats) {
            $this->collection[] = $commission;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return CommissionStats[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return CommissionStats
     */
    public function current()
    {
        return parent::current();
    }
}
