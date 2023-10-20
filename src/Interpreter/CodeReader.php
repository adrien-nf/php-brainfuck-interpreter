<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

use AdrienNf\BrainfuckInterpreter\Exceptions\ReaderReachedEndOfText;

class CodeReader
{
	protected int $pointer = 0;

	public function __construct(protected string $code)
	{
		//
	}

	public function setPointer(int $value): void
	{
		$this->pointer = $value;
	}

	public function getPointer(): int
	{
		return $this->pointer;
	}

	public function read(): string | null
	{
		if ($this->hasEnded()) throw new ReaderReachedEndOfText();

		return $this->code[$this->pointer++];
	}

	public function hasEnded(): bool
	{
		return $this->pointer >= strlen($this->code);
	}

	public function getLoopEnd(int $start): int
	{
		while ($this->read() !== "]");

		$loopEnd = $this->pointer;

		$this->pointer = $start;

		return $loopEnd;
	}
}
