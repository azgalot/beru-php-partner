<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\Model;

class PaymentStats extends Model
{
    const PAYMENT_TYPE_PAYMENT = 'PAYMENT';
    const PAYMENT_TYPE_REFUND = 'REFUND';
    const PAYMENT_SOURCE_TYPE_BUYER = 'BUYER';
    const PAYMENT_SOURCE_TYPE_CASHBACK = 'CASHBACK';
    const PAYMENT_SOURCE_TYPE_MARKETPLACE = 'MARKETPLACE';
    const PAYMENT_SOURCE_TYPE_SPASIBO = 'SPASIBO';

    protected $id;
    protected $date;
    protected $type;
    protected $source;
    protected $total;
    protected $paymentOrder;

    protected $mappingClasses = [
        'paymentOrder' => PaymentOrderStats::class,
    ];

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return PaymentOrderStats
     */
    public function getPaymentOrder()
    {
        return $this->paymentOrder;
    }
}
