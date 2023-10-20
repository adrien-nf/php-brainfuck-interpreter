<?php

declare(strict_types=1);

use AdrienNf\BrainfuckInterpreter\Exceptions\NotEnoughInputArgsException;
use AdrienNf\BrainfuckInterpreter\Interpreter\Inputs;
use PHPUnit\Framework\TestCase;

final class InputsTest extends TestCase
{
	public function testCanCreateInputFromArray(): void
	{
		$inputs = new Inputs([125, 46, 0, 15]);

		$this->assertSame(125, $inputs->get());
		$this->assertSame(46, $inputs->get());
		$this->assertSame(0, $inputs->get());
		$this->assertSame(15, $inputs->get());
	}

	public function testCanCreateInputFromString(): void
	{
		$inputs = new Inputs("125 46 0 15");

		$this->assertSame(125, $inputs->get());
		$this->assertSame(46, $inputs->get());
		$this->assertSame(0, $inputs->get());
		$this->assertSame(15, $inputs->get());
	}

	public function testCrashesWhenNotEnoughInputArgs(): void
	{
		$inputs = new Inputs("125 46 0 15");

		$this->assertSame(125, $inputs->get());
		$this->assertSame(46, $inputs->get());
		$this->assertSame(0, $inputs->get());
		$this->assertSame(15, $inputs->get());

		$this->expectException(NotEnoughInputArgsException::class);
		$inputs->get();
	}
}
