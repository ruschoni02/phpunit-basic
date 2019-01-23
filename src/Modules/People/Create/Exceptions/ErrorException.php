<?php

namespace PHPUnitBasic\Modules\People\Create\Exceptions;

use Throwable;

class ErrorException extends \Exception
{
    public function __construct(
        string $message = 'Error',
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
