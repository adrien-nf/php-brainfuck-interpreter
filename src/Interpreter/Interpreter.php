<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

use AdrienNf\BrainfuckInterpreter\Interpreter\CodeReader;
use AdrienNf\BrainfuckInterpreter\Interpreter\Data;
use AdrienNf\BrainfuckInterpreter\Interpreter\LoopCounter;
use AdrienNf\BrainfuckInterpreter\Interpreter\Response;

class Interpreter
{
	protected CodeReader $reader;
	protected Data $data;
	protected LoopCounter $loopCounter;
	protected Response $response;

	public function __construct(string $code)
	{
		$this->reader = new CodeReader($code);
		$this->data = new Data();
		$this->loopCounter = new LoopCounter();
	}

	public function run(): Response
	{
		if (isset($this->response)) return $this->response;

		$this->response = new Response();

		return $this->runUntilEnd();
	}

	protected function runUntilEnd(): Response
	{
		while (!$this->reader->hasEnded()) {
			$char = $this->reader->read();

			$this->interpret($char);
		}

		return $this->response;
	}

	protected function interpret(string $char): void
	{
		switch ($char) {
			case ">":
				$this->data->incrementPointer();
				break;
			case "<":
				$this->data->decrementPointer();
				break;
			case "+":
				$this->data->increment();
				break;
			case "-":
				$this->data->decrement();
				break;
			case ".":
				$this->response->add($this->data->get());
				break;
			case ",":
			case "[":
				$this->onOpenBracket();
				break;
			case "]":
				$this->onCloseBracket();
				break;
		}
	}

	protected function onOpenBracket(): void
	{
		$shouldLoop = $this->data->get() !== 0;

		if ($shouldLoop) {
			$start = $this->reader->getPointer();

			$this->loopCounter->start($start, $this->reader->getLoopEnd($start));
		}
	}

	protected function onCloseBracket(): void
	{
		$shouldLoop = $this->data->get() !== 0;

		if ($shouldLoop) {
			$this->reader->setPointer($this->loopCounter->getLoopStart());
		} else {
			$this->loopCounter->stop();
		}
	}
}
