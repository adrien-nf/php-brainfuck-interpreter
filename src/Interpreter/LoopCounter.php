<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

class LoopCounter
{
	protected array $loops = [];

	public function start(int $start, int $end): void
	{
		$this->loops[] = [$start, $end];
	}

	public function stop(): void
	{
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
		return $this->loops[count($this->loops) - 1];
	}
}
