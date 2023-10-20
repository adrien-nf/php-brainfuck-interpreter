<?php

namespace AdrienNf\BrainfuckInterpreter\Exceptions;

use Exception;

class NotEnoughInputArgsException extends Exception
{
	public function __construct()
	{
		parent::__construct("Not enough input args");
	}
}
