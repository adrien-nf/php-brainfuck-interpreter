<?php

namespace AdrienNf\BrainfuckInterpreter\Interpreter;

class ResponseBuilder
{
	protected array $data = [];

	public function add(int $value): void
	{
		$this->data[] = $value;
	}

	public function build(): Response
	{
		$response = new Response($this->data);

		$this->data = [];

		return $response;
	}
}
