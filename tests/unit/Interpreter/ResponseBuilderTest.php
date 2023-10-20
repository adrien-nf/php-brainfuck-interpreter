<?php

declare(strict_types=1);

use AdrienNf\BrainfuckInterpreter\Response\Response;
use AdrienNf\BrainfuckInterpreter\Response\ResponseBuilder;
use PHPUnit\Framework\TestCase;

final class TestableResponseBuilder extends ResponseBuilder {
    public function getData(): array {
        return $this->data;
    }
}

final class ResponseBuilderTest extends TestCase
{
    public function testAdd()
    {
        $builder = new TestableResponseBuilder();
        $builder->add(72);
        $builder->add(101);

        $this->assertSame([72, 101], $builder->getData());
    }

    public function testBuild()
    {
        $builder = new TestableResponseBuilder();
        $builder->add(72);
        $builder->add(101);
        $builder->add(108);

        $response = $builder->build();
        $this->assertSame([], $builder->getData());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame([72, 101, 108], $response->getData());
    }
}
