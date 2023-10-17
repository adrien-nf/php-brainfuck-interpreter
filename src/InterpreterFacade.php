<?php

namespace AdrienNf\BrainfuckInterpreter;

use AdrienNf\BrainfuckInterpreter\Interpreter\Interpreter;
use AdrienNf\BrainfuckInterpreter\Interpreter\Response;

class InterpreterFacade
{
	public static function run(string $code): Response
	{
		return (new Interpreter($code))->run();
	}
}
