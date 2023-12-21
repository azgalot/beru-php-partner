<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\Model;

class CommissionStats extends Model
{
    const FEE = 'FEE';
    const FULFILLMENT = 'FULFILLMENT';
    const LOYALTY_PARTICIPATION_FEE = 'LOYALTY_PARTICIPATION_FEE';
    const AUCTION_PROMOTION = 'AUCTION_PROMOTION';
    const INSTALLMENT = 'INSTALLMENT';
    const DELIVERY_TO_CUSTOMER = 'DELIVERY_TO_CUSTOMER';
    const EXPRESS_DELIVERY_TO_CUSTOMER = 'EXPRESS_DELIVERY_TO_CUSTOMER';
    const AGENCY = 'AGENCY';
    const PAYMENT_TRANSFER = 'PAYMENT_TRANSFER';
    const RETURNED_ORDERS_STORAGE = 'RETURNED_ORDERS_STORAGE';
    const SORTING = 'SORTING';

    public $type;
    public $actual;

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
    public function getActual()
    {
        return $this->actual;
    }
}
