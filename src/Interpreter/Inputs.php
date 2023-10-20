<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

use AdrienNf\BrainfuckInterpreter\Exceptions\NotEnoughInputArgsException;

class Inputs
{
	protected int $pointer = 0;
	protected array $data;

	public function __construct(string|array $data)
	{
		if (is_array($data)) {
			$this->data = $data;
		} else {
			$this->data = array_map(fn ($e) => intval($e), explode(" ", $data));
		}
	}

	public function get(): int
	{
		if ($this->pointer >= count($this->data)) throw new NotEnoughInputArgsException();

		return $this->data[$this->pointer++];
	}
}
