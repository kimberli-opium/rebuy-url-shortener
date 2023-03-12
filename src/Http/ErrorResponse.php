<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener\Http;

class ErrorResponse extends Response
{
    public function isSuccess(): bool
    {
        return false;
    }
}
