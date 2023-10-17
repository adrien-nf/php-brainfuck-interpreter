<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

class Data
{
	protected int $pointer = 0;

	protected array $dataTable = [0];

	public function get(): int
	{
		return $this->dataTable[$this->pointer];
	}

	public function set(int $value): void
	{
		$this->dataTable[$this->pointer] = $value;
	}

	public function increment(): void
	{
		$this->set($this->get() + 1);
	}

	public function decrement(): void
	{
		$this->set($this->get() - 1);
	}

	public function incrementPointer(): void
	{
		$this->pointer++;

		if (!isset($this->dataTable[$this->pointer])) $this->dataTable[$this->pointer] = 0;
	}

	public function decrementPointer(): void
	{
		$this->pointer--;
	}

	public function getDataTable(): array
	{
		return $this->dataTable;
	}

	public function getPointer(): int
	{
		return $this->pointer;
	}
}
