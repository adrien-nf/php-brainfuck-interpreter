<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

class Response
{
	public function __construct(protected array $data)
	{
		//
	}

	public function getDataAt(int $index): int
	{
		return $this->data[$index];
	}

	public function getData(): array
	{
		return $this->data;
	}

	public function getDataAsString(): string
	{
		return join("", array_map(fn ($e) => chr($e), $this->data));
	}
}
