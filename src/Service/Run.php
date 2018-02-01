<?php

namespace App\Service;

use Ratchet;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

require __DIR__.'/../../vendor/autoload.php';

class Run
{
    public function __construct()
    {
/*        $app = new Ratchet\App('localhost', 18882);
        $app->route('/chat', new Websocket);
        $app->route('/echo', new Ratchet\Server\EchoServer, array('*'));
        $app->run();
        sleep(2000000000);*/
    }
}

new Run();