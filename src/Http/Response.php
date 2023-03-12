<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener\Http;

abstract class Response
{
    public function __construct(private readonly string $body)
    {
    }

    abstract public function isSuccess(): bool;

    public function getBody(): string
    {
        return $this->body;
    }
}
