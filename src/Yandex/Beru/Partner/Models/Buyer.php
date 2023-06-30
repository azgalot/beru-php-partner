<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Buyer extends Model
{
    const TYPE_PERSON = 'PERSON';

    const TYPE_BUSINESS = 'BUSINESS';

    protected $type;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
