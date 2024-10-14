<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Beru\Partner\Models\Campaigns;
use Yandex\Beru\Partner\Models\Common\Errors;
use Yandex\Beru\Partner\Models\Common\Pager;
use Yandex\Common\Model;

class GetCampaignsResponse extends Model
{
    protected $errors;
    protected $campaigns;
    protected $status;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'pager' => Pager::class,
        'campaigns' => Campaigns::class,
    ];

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return Campaigns
     */
    public function getResult()
    {
        return $this->campaigns;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
