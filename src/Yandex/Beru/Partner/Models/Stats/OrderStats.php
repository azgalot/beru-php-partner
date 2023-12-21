<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\Model;

class OrderStats extends Model
{
    const ORDER_STATUS_CANCELLED_BEFORE_PROCESSING = 'CANCELLED_BEFORE_PROCESSING';
    const ORDER_STATUS_CANCELLED_IN_DELIVERY = 'CANCELLED_IN_DELIVERY';
    const ORDER_STATUS_CANCELLED_IN_PROCESSING = 'CANCELLED_IN_PROCESSING';
    const ORDER_STATUS_DELIVERY = 'DELIVERY';
    const ORDER_STATUS_DELIVERED = 'DELIVERED';
    const ORDER_STATUS_PARTIALLY_DELIVERED = 'PARTIALLY_DELIVERED';
    const ORDER_STATUS_PARTIALLY_RETURNED = 'PARTIALLY_RETURNED';
    const ORDER_STATUS_PICKUP = 'PICKUP';
    const ORDER_STATUS_PICKUP_USER_RECEIVED = 'PICKUP_USER_RECEIVED';
    const ORDER_STATUS_PROCESSING = 'PROCESSING';
    const ORDER_STATUS_REJECTED = 'REJECTED';
    const ORDER_STATUS_RETURNED = 'RETURNED';
    const ORDER_STATUS_LOST = 'LOST';
    const ORDER_STATUS_UNKNOWN = 'UNKNOWN';
    const PAYMENT_TYPE_CREDIT = 'CREDIT';
    const PAYMENT_TYPE_POSTPAID = 'POSTPAID';
    const PAYMENT_TYPE_PREPAID = 'PREPAID';

    protected $id;
    protected $creationDate;
    protected $statusUpdateDate;
    protected $status;
    protected $partnerOrderId;
    protected $paymentType;
    protected $fake;
    protected $deliveryRegion;
    protected $items;
    protected $initialItems;
    protected $payments;
    protected $commissions;

    protected $mappingClasses = [
        'deliveryRegion' => DeliveryRegion::class,
        'commissions' => CommissionsStats::class,
        'payments' => PaymentsStats::class,
        'items' => OrderItemsStats::class,
        'initialItems' => OrderItemsStats::class,
    ];

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
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return string
     */
    public function getStatusUpdateDate()
    {
        return $this->statusUpdateDate;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getPartnerOrderId()
    {
        return $this->partnerOrderId;
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @return bool
     */
    public function getFake()
    {
        return $this->fake;
    }

    /**
     * @return DeliveryRegion
     */
    public function getDeliveryRegion()
    {
        return $this->deliveryRegion;
    }

    /**
     * @return CommissionsStats
     */
    public function getCommissions()
    {
        return $this->commissions;
    }

    /**
     * @return PaymentsStats
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @return OrderItemsStats
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return OrderItemsStats
     */
    public function getInitialItems()
    {
        return $this->initialItems;
    }
}
