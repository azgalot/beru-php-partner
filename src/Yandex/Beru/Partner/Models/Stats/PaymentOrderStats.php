<?php

namespace Yandex\Beru\Partner\Models\Stats;

use Yandex\Common\Model;

class PaymentOrderStats extends Model
{
    protected $id;
    protected $date;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
}
