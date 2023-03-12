<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Rebuy\UrlShortener\Domain\Url;
use Rebuy\UrlShortener\Http\ErrorResponse;
use Rebuy\UrlShortener\Http\Response;
use Rebuy\UrlShortener\Http\SuccessResponse;

class ApiClient
{
    private const AUTHENTICATION_KEY = 'api_token';
    private const PARAM_LONG_URL = 'long_url';
    private const PARAM_DOMAIN_CUSTOM_DOMAIN_TO_SHORTEN_LINK = 'domain';

    public function __construct(
        private readonly Client $guzzle,
        private readonly string $baseUrl,
        private readonly string $apiKey,
    ) {
    }

    public function query(Url $longUrl, string $endpoint): Response
    {
        if (!$longUrl->isRebuyUrl()) {
            return new ErrorResponse('Is limited to reBuy product URLs only');
        }

        $headers = ['Content-Type' => 'application/json', 'Accept' => 'application/json'];
        $params = [self::AUTHENTICATION_KEY => $this->apiKey];
        $body = json_encode([
            self::PARAM_LONG_URL => $longUrl->asString(),
            self::PARAM_DOMAIN_CUSTOM_DOMAIN_TO_SHORTEN_LINK => $this->baseUrl
        ], JSON_THROW_ON_ERROR);

        $response = $this->guzzle->post($this->baseUrl . $endpoint, [
            RequestOptions::QUERY => $params,
            RequestOptions::HEADERS => $headers,
            RequestOptions::BODY => $body,
        ]);

        return new SuccessResponse(json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR)['short_url']);
    }
}
