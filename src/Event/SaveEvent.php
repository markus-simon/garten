<?php

namespace App\Event;

use Symfony\Component\EventDispatcher\Event;
use App\Entity\Event as EventEntity;

/**
 * The order.placed event is dispatched each time an order is created
 * in the system.
 */
class SaveEvent extends Event
{
    const NAME = 'order.placed';

    public $event;

    public function __construct(EventEntity $event)
    {
        $this->event = $event;
    }

    public function getEvent()
    {
        return $this->event;
    }
}