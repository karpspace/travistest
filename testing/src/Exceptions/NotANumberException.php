<?php

    class NotANumberException extends Exception {
        public function __construct($message = null, $code = 0)
        {
            $message = 'MSG: '. $message;
            parent::__construct($message, $code);
        }
    }