<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class UserStatusException extends Exception
{
    public function __construct(string $message = "", int $code = 401, ?Throwable $previous = null)
    {
        if (!$message) {
            $message = __('auth.deactivated');
        }

        parent::__construct($message, $code, $previous);
    }
}
