<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;
use PHPUnit\Framework\TestCase;

class TestableLoopCounter extends LoopCounter {
    public function pubGetCurrentLoop(): array {
        return $this->getCurrentLoop();
    }
}

final class LoopCounterTest extends TestCase
{
    public function testStart()
    {
        $counter = new TestableLoopCounter();

        $counter->start(1, 5);
        $this->assertSame([1, 5], $counter->pubGetCurrentLoop());

        $counter->start(10, 20);
        $this->assertSame([10, 20], $counter->pubGetCurrentLoop());
    }

    public function testStop()
    {
        $counter = new TestableLoopCounter();

        $counter->start(1, 5);
        $counter->start(10, 20);

        $this->assertSame([10, 20], $counter->pubGetCurrentLoop());

        $counter->stop();
        $this->assertSame([1, 5], $counter->pubGetCurrentLoop());

        $counter->stop();
        $this->assertSame(null, $counter->pubGetCurrentLoop());
    }

    public function testGetLoopStart()
    {
        $counter = new TestableLoopCounter();

        $counter->start(1, 5);
        $this->assertSame(1, $counter->getLoopStart());

        $counter->start(10, 20);
        $this->assertSame(10, $counter->getLoopStart());
    }

    public function testGetLoopEnd()
    {
        $counter = new TestableLoopCounter();

        $counter->start(1, 5);
        $this->assertSame(5, $counter->getLoopEnd());

        $counter->start(10, 20);
        $this->assertSame(20, $counter->getLoopEnd());
    }
}