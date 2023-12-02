<?php

namespace core;

class Base
{
    use TSingleton;
    
    public function Redirect(string $url, int $statusCode = 302)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
}