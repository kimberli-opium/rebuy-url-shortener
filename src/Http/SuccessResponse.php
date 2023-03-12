<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener\Http;

class SuccessResponse extends Response
{
    public function isSuccess(): bool
    {
        return true;
    }
}
