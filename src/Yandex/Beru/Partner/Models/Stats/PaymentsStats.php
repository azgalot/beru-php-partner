<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\ObjectModel;

class PaymentsStats extends ObjectModel
{
    /**
     * @param array|object $paymentStats
     *
     * @return PaymentsStats
     */
    public function add($paymentStats)
    {
        if (is_array($paymentStats)) {
            $this->collection[] = new PaymentStats($paymentStats);
        } elseif (is_object($paymentStats) && $paymentStats instanceof PaymentStats) {
            $this->collection[] = $paymentStats;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return PaymentStats[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return PaymentStats
     */
    public function current()
    {
        return parent::current();
    }
}
