<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Courier extends Model
{
    protected $fullName;
    protected $phone;
    protected $phoneExtension;
    protected $vehicleNumber;
    protected $name;
    protected $vehicleDescription;

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getPhoneExtension()
    {
        return $this->phoneExtension;
    }

    /**
     * @return string
     */
    public function getVehicleNumber()
    {
        return $this->vehicleNumber;
    }

    /**
     * @return string
     */
    public function getVehicleDescription()
    {
        return $this->vehicleDescription;
    }
}
