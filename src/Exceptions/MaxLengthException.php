<?php


namespace Bradesco\Exceptions;


use Exception;

class MaxLengthException extends Exception
{
    public function __construct($attribute, $length, $code = 0, $previous = null)
    {
        $message = printf("%s exceeds maximum allowed length of %d characters.",ucfirst($attribute), $length);
        parent::__construct($message, $code, $previous);
    }
}