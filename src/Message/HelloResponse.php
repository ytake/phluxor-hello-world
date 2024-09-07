<?php

declare(strict_types=1);

namespace Sample\Message;

readonly class HelloResponse
{
    public function __construct(
        public string $message
    ) {
    }
}
