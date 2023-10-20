<?php

declare(strict_types=1);

use AdrienNf\BrainfuckInterpreter\Interpreter\Interpreter;
use PHPUnit\Framework\TestCase;

final class InterpreterTest extends TestCase
{
	public function testInterpreterCanPlayAdditionProgram(): void
	{
		$interpreter = new Interpreter("+++[->+<]>.");

		$response = $interpreter->run();

		$this->assertSame(3, $response->getDataAt(0));
	}

	public function testInterpreterCanPlayHelloWorld(): void
	{
		$interpreter = new Interpreter("++++++++[>++++[>++>+++>+++>+<<<<-]>+>+>->>+[<]<-]>>.>---.+++++++..+++.>>.<-.<.+++.------.--------.>>+.");

		$response = $interpreter->run();

		$helloWorld = "Hello World!";

		for ($i = 0; $i < strlen($helloWorld); $i++) {
			$this->assertSame(ord($helloWorld[$i]), $response->getDataAt($i));
		}
	}

	public function testInputsAreWorking(): void
	{
		$interpreter = new Interpreter(".+.+++.,.,.,.", "12 20 30");

		$response = $interpreter->run();

		$this->assertSame(0, $response->getDataAt(0));
		$this->assertSame(1, $response->getDataAt(1));
		$this->assertSame(4, $response->getDataAt(2));
		$this->assertSame(12, $response->getDataAt(3));
		$this->assertSame(20, $response->getDataAt(4));
		$this->assertSame(30, $response->getDataAt(5));
	}
}
