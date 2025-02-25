<?php

require 'vendor/autoload.php';

use function Swoole\Coroutine\go;
use function Swoole\Coroutine\run;

run(function () {
    go(function () {
        $system = \Phluxor\ActorSystem::create();
        $props = Phluxor\ActorSystem\Props::fromProducer(
            fn() => new Sample\HelloActor()
        );
        $ref = $system->root()->spawn($props);
        $future = $system->root()->requestFuture(
            $ref,
            new \Sample\Message\HelloRequest('World'),
            10
        );
        $response = $future->result();
        var_dump($response->value());
    });
});
