<?php

namespace AdrienNf\BrainfuckInterpreter;

use AdrienNf\BrainfuckInterpreter\Interpreter\Interpreter;
use AdrienNf\BrainfuckInterpreter\Interpreter\Response;

class InterpreterFacade
{
	public static function run(string $code, string|array $input = []): Response
	{
		return (new Interpreter($code, $input))->run();
	}
}
