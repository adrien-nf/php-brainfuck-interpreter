<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

use OutOfRangeException;

class LoopCounter
{
	protected array $loops = [];

	public function start(int $start, int $end): void
	{
		$this->loops[] = [$start, $end];
	}

	public function stop(): void
	{
		$lastIndex = count($this->loops) - 1;

		if(!array_key_exists($lastIndex, $this->loops)) throw new OutOfRangeException();

		array_pop($this->loops);
	}

	public function getLoopStart(): int
	{
		return $this->getCurrentLoop()[0];
	}

	public function getLoopEnd(): int
	{
		return $this->getCurrentLoop()[1];
	}

	protected function getCurrentLoop(): array
	{
		$lastIndex = count($this->loops) - 1;

		if(!array_key_exists($lastIndex, $this->loops)) throw new OutOfRangeException();

		return $this->loops[$lastIndex];
	}
}
