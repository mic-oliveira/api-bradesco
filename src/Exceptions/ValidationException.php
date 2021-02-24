<?php


namespace Bradesco\Exceptions;


use Exception;
use Throwable;

class ValidationException extends Exception
{
    public function __construct($attribute, $code = 0, Throwable $previous = null)
    {
        $message = printf("Mandatory %s invalid.", $attribute);
        parent::__construct($message, $code, $previous);
    }

}
