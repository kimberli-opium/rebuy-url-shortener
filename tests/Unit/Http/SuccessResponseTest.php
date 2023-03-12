<?php

declare(strict_types=1);

namespace Rebuy\UrlShortener\Unit\Http;

use PHPUnit\Framework\TestCase;
use Rebuy\UrlShortener\Http\SuccessResponse;

/**
 * @covers \Rebuy\UrlShortener\Http\SuccessResponse
 * @covers \Rebuy\UrlShortener\Http\Response
 */
class SuccessResponseTest extends TestCase
{
    public function testIsSuccess(): void
    {
        $response = new SuccessResponse('success');

        $this->assertTrue($response->isSuccess());
        $this->assertSame('success', $response->getBody());
    }
}
