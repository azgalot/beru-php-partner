<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Campaigns extends ObjectModel
{
    /**
     * @param array|object $shipmentItem
     *
     * @return Campaigns
     */
    public function add($shipmentItem)
    {
        if (is_array($shipmentItem)) {
            $this->collection[] = new Campaign($shipmentItem);
        } elseif (is_object($shipmentItem) && $shipmentItem instanceof Campaign) {
            $this->collection[] = $shipmentItem;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return Campaign[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Campaign
     */
    public function current()
    {
        return parent::current();
    }
}
