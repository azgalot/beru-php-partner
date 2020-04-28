<?php

namespace Yandex\Beru\Partner\Exception;

use Throwable;
use Yandex\Beru\Partner\Exception\PartnerException;

class ExtendedErrorsException extends PartnerException
{
    /**
     * @var array
     */
    protected $context;

    /**
     * ExtendedErrorsException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param array          $context
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, array $context = [], Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->context = $context;
    }

    /**
     * @return array
     */
    public function getContext()
    {
        return $this->context;
    }
}
