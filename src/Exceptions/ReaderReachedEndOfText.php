<?php

namespace AdrienNf\BrainfuckInterpreter\Exceptions;

use Exception;

class ReaderReachedEndOfText extends Exception
{
	public function __construct()
	{
		parent::__construct("Reader has reached end of text");
	}
}
