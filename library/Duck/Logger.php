<?php

namespace Duck;

class Logger
{

    private $handle;

    public function __construct($file)
    {
        $this->handle = fopen(__DIR__ . '/../../' . $file, 'a');
    }


    public function __destruct()
    {
        fclose($this->handle);
        unset($this->handle);
    }

    public function write(Duck $duck, $raw)
    {
        $message = "Duck #{$duck->getUuid()} -> $raw";
        fwrite($this->handle, $message . "\n");
    }


}
