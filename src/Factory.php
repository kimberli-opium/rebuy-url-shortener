<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener;

use GuzzleHttp\Client;

class Factory
{
    public function createApiClient(): ApiClient
    {
        return new ApiClient(
            $this->createGuzzleClient(),
            $this->createConfig()->getTlyBaseUrl(),
            $this->createConfig()->getTlyApiKey()
        );
    }

    private function createGuzzleClient(): Client
    {
        return new Client();
    }

    private function createConfig(): Config
    {
        return new Config();
    }
}
