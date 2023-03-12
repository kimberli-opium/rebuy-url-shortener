<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener;

class Config
{
    public function getTlyApiKey(): string
    {
        return 'Yvhh4ThJLfm6YDatXP2GZLW8NJRWXoeBDqoDghnJeHj3zuJL8MvFts8flThO';
    }

    public function getTlyBaseUrl(): string
    {
        return 'https://t.ly/';
    }
}
