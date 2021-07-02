<?php

class ErrorDisplay
{
     /**
        * Class constructor.
     */
    public static function DesiplayErrors($class, $message)
    {
        return ['class' => $class, 'message' => $message];
    }
}
