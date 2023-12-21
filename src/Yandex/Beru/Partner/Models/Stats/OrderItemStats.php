<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\Model;

class OrderItemStats extends Model
{
    protected $offerName;
    protected $marketSku;
    protected $shopSku;
    protected $count;
    protected $prices;
    protected $warehouse;
    protected $details;
    protected $cisList;
    protected $initialCount;
    protected $bidFee;
    protected $cofinanceThreshold;
    protected $cofinanceValue;

    protected $mappingClasses = [
        'prices' => PricesStats::class,
        'warehouse' => WarehouseStats::class,
        'details' => DetailsStats::class
    ];

    /**
     * @return string
     */
    public function getOfferName()
    {
        return $this->offerName;
    }

    /**
     * @return int
     */
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    /**
     * @return string
     */
    public function getShopSku()
    {
        return $this->shopSku;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return string[]
     */
    public function getCisList()
    {
        return $this->cisList;
    }

    /**
     * @return int
     */
    public function getInitialCount()
    {
        return $this->initialCount;
    }

    /**
     * @return int
     */
    public function getBidFee()
    {
        return $this->bidFee;
    }

    /**
     * @return double
     */
    public function getCofinanceThreshold()
    {
        return $this->cofinanceThreshold;
    }

    /**
     * @return double
     */
    public function getCofinanceValue()
    {
        return $this->cofinanceValue;
    }

    /**
     * @return PricesStats
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @return WarehouseStats
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * @return DetailsStats
     */
    public function getDetails()
    {
        return $this->details;
    }
}
