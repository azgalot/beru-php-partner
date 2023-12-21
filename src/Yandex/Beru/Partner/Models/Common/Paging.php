<?php

namespace Yandex\Beru\Partner\Models\Common;

use Yandex\Common\Model;

class Paging extends Model
{
    protected $nextPageToken;

    /**
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }
}
