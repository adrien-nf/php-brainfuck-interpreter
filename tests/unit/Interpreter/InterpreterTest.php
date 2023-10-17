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
		$interpreter = new Interpreter("++++++++[>++++[>++>+++>+++>+<<<<-]>+>+>->>+[<]<-]>>.>---.+++++++..+++.>>.<-.<.+++.------.--------.>>+.>++.");

		$response = $interpreter->run();

		$helloWorld = "Hello World!";

		for ($i = 0; $i < strlen($helloWorld); $i++) {
			$this->assertSame(ord($helloWorld[$i]), $response->getDataAt($i));
		}
	}
}
