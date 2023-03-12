<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener;

class Config
{
    public function getTlyApiKey(): string
    {
        return '4Qm1Gv6LImTXcjYr4pHjbTvqwdrZJyZcrsNyXxFEPc7lC4EW4SlnJg5QcUsB';
    }

    public function getTlyBaseUrl(): string
    {
        return 'https://t.ly/';
    }
}
