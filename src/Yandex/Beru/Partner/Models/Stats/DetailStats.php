<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\Model;

class DetailStats extends Model
{
    const ITEM_STATUS_REJECTED = 'REJECTED';
    const ITEM_STATUS_RETURNED = 'RETURNED';
    const STOCK_TYPE_DEFECT = 'DEFECT';
    const STOCK_TYPE_FIT = 'FIT';

    protected $itemStatus;
    protected $itemCount;
    protected $updateDate;
    protected $stockType;

    /**
     * @return string
     */
    public function getItemStatus()
    {
        return $this->itemStatus;
    }

    /**
     * @return int
     */
    public function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * @return string
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @return string
     */
    public function getStockType()
    {
        return $this->stockType;
    }
}
