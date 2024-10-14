<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Campaign extends Model
{
    protected $domain;
    protected $id;
    protected $clientId;
    protected $business;
    protected $placementType;

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return Business
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * @param Business $business
     */
    public function setBusiness($business)
    {
        $this->business = $business;
    }

    /**
     * @return 'FBS'|'FBY'
     */
    public function getPlacementType()
    {
        return $this->placementType;
    }

    /**
     * @param 'FBS'|'FBY' $placementType
     */
    public function setPlacementType($placementType)
    {
        $this->placementType = $placementType;
    }
}
