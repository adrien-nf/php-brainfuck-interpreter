<?php

declare(strict_types=1);

use AdrienNf\BrainfuckInterpreter\Interpreter\Response;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
    protected array $data;

    protected function setUp(): void
    {
        $this->data = [72, 101, 108, 108, 111];
    }

    public function testGetDataAt()
    {
        $response = new Response($this->data);

        $this->assertSame(72, $response->getDataAt(0));
        $this->assertSame(101, $response->getDataAt(1));
        $this->assertSame(108, $response->getDataAt(2));
        $this->assertSame(108, $response->getDataAt(3));
        $this->assertSame(111, $response->getDataAt(4));
    }

    public function testGetData()
    {
        $response = new Response($this->data);

        $this->assertSame($this->data, $response->getData());
    }

    public function testGetDataAsAscii()
    {
        $response = new Response($this->data);

        $expectedAscii = "Hello";
        $this->assertSame($expectedAscii, $response->getDataAsAscii());
    }

    public function testGetDataAtOutOfBounds()
    {
        $response = new Response($this->data);

        $this->expectException(OutOfRangeException::class);
        $response->getDataAt(5);
    }
}