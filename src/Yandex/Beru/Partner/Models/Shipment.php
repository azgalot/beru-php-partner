<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Shipment extends Model
{
    protected $id;
    protected $boxes;
    protected $shipmentDate;
    protected $shipmentTime;

    protected $mappingClasses = [
        'boxes' => Boxes::class
    ];

    /**
     * @return Boxes
     */
    public function getBoxes()
    {
        return $this->boxes;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getShipmentDate()
    {
        return $this->shipmentDate;
    }

    /**
     * @return string|null
     */
    public function getShipmentTime()
    {
        return $this->shipmentTime;
    }
}
