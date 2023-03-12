<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener\Domain;

use Rebuy\UrlShortener\Exception\EnsureException;

class Url
{
    public function __construct(private readonly string $value)
    {
        $this->ensureIsValidUrl($this->value);
    }

    public function asString(): string
    {
        return $this->value;
    }

    public function isRebuyUrl(): bool
    {
        return $this->getDomain() === 'www.rebuy.de';
    }

    private function getDomain(): string
    {
        return parse_url($this->value, PHP_URL_HOST);
    }

    private function ensureIsValidUrl(string $url): void
    {
        if (preg_match('/^https?:\/\//', $url) === 0) {
            throw new EnsureException(sprintf("URL '%s' is not absolute", $url));
        }
    }
}
