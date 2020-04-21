<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Dates extends Model
{
    protected $fromDate;
    protected $toDate;
    protected $fromTime;
    protected $toTime;

    /**
     * @return string|null
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * @return string|null
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * @return string|null
     */
    public function getFromTime()
    {
        return $this->fromTime;
    }

    /**
     * @return string|null
     */
    public function getToTime()
    {
        return $this->toTime;
    }
}
