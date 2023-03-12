<?php

namespace Rebuy\UrlShortener\Unit\Domain;

use PHPUnit\Framework\TestCase;
use Rebuy\UrlShortener\Domain\Url;
use Rebuy\UrlShortener\Exception\EnsureException;

/**
 * @covers \Rebuy\UrlShortener\Domain\Url
 */
class UrlTest extends TestCase
{
    public function testAsString(): void
    {
        $url = new Url('https://some-url');
        $this->assertSame('https://some-url', $url->asString());
    }

    public function testIsRebuyUrl(): void
    {
        $this->assertTrue((new Url('https://www.rebuy.de/some-link'))->isRebuyUrl());
    }

    public function testThrowsEnsureException(): void
    {
        $this->expectException(EnsureException::class);
        $this->expectExceptionMessage("URL 'not-url' is not absolute");

        new Url('not-url');
    }
}
