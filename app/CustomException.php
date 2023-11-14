<?php

namespace App;

use Throwable;

class CustomException extends \Exception
{
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        //вызываем конструктор базового класса exception
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return "[{$this->code}]: {$this->message}\n";
    }
}