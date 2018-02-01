<?php

namespace App\Listener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class SaveEvent
{
    public function onSaveBefore($event)
    {
        $vvv = $event;
        return $event;
    }

    public function onSaveAfter($event)
    {
        $vvv = $event;
        return $event;
    }
}