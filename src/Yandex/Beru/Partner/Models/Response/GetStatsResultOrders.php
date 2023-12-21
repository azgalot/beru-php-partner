<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Beru\Partner\Models\Common\Paging;
use Yandex\Beru\Partner\Models\Stats\OrdersStats;
use Yandex\Common\Model;

class GetStatsResultOrders extends Model
{
    protected $orders;
    protected $paging;

    protected $mappingClasses = [
        'orders' => OrdersStats::class,
        'paging' => Paging::class
    ];

    /**
     * @return OrdersStats
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @return Paging
     */
    public function getPaging()
    {
        return $this->paging;
    }
}
