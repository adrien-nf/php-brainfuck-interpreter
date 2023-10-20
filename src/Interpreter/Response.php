<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

use OutOfRangeException;

class Response
{
	public function __construct(protected array $data)
	{
		//
	}

	public function getDataAt(int $index): int
	{
		if(!array_key_exists($index, $this->data)) throw new OutOfRangeException();

		return $this->data[$index];
	}

	public function getData(): array
	{
		return $this->data;
	}

	public function getDataAsAscii(): string
	{
		return join("", array_map(fn ($e) => chr($e), $this->data));
	}
}
