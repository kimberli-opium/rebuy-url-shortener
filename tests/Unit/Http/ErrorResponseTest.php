<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener\Unit\Http;

use PHPUnit\Framework\TestCase;
use Rebuy\UrlShortener\Http\ErrorResponse;

class ErrorResponseTest extends TestCase
{
    public function testIsSuccess(): void
    {
        $response = new ErrorResponse('error');

        $this->assertFalse($response->isSuccess());
        $this->assertSame('error', $response->getBody());
    }
}
