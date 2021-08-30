<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Common\Model;

class StocksResponse extends Model
{
    protected $warehouseId;
    protected $skus;
    protected $partnerWarehouseId;

    /**
     * @return int
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }

    /**
     * @return string[]
     */
    public function getSkus()
    {
        return $this->skus;
    }

    /**
     * @return null|string
     */
    public function getPartnerWarehouseId()
    {
        return $this->partnerWarehouseId;
    }
}
