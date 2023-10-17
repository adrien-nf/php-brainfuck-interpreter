<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

class Response
{
	protected array $data = [];

	public function add(int $value): void
	{
		$this->data[] = $value;
	}

	public function getDataAt(int $index): int
	{
		return $this->data[$index];
	}

	public function getData(): array
	{
		return $this->data;
	}
}
