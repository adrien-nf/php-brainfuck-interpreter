<?php

declare(strict_types=1);

use AdrienNf\BrainfuckInterpreter\Interpreter\Data;
use PHPUnit\Framework\TestCase;

final class DataTest extends TestCase
{
	public function testDataCanBeIncremented(): void
	{
		$data = new Data();

		$this->assertSame(0, $data->get());

		$data->increment();

		$this->assertSame(1, $data->get());

		$data->increment();
		$data->increment();
		$data->increment();

		$this->assertSame(4, $data->get());
	}

	public function testDataCanBeDecremented(): void
	{
		$data = new Data();

		$this->assertSame(0, $data->get());

		$data->increment();
		$data->increment();
		$data->increment();
		$data->increment();

		$this->assertSame(4, $data->get());

		$data->decrement();

		$this->assertSame(3, $data->get());

		$data->decrement();
		$data->decrement();
		$data->decrement();

		$this->assertSame(0, $data->get());
	}

	public function testPointerCanBeIncremented(): void
	{
		$data = new Data();

		$this->assertSame(0, $data->getPointer());
		$this->assertSame(1, count($data->getDataTable()));

		$data->incrementPointer();

		$this->assertSame(1, $data->getPointer());
		$this->assertSame(2, count($data->getDataTable()));

		$data->incrementPointer();
		$data->incrementPointer();
		$data->incrementPointer();

		$this->assertSame(4, $data->getPointer());
		$this->assertSame(5, count($data->getDataTable()));
	}

	public function testPointerCanBeDecremented(): void
	{
		$data = new Data();

		$this->assertSame(0, $data->getPointer());
		$this->assertSame(1, count($data->getDataTable()));

		$data->incrementPointer();
		$data->incrementPointer();
		$data->incrementPointer();
		$data->incrementPointer();

		$this->assertSame(4, $data->getPointer());
		$this->assertSame(5, count($data->getDataTable()));

		$data->decrementPointer();

		$this->assertSame(3, $data->getPointer());
		$this->assertSame(5, count($data->getDataTable()));

		$data->decrementPointer();
		$data->decrementPointer();
		$data->decrementPointer();

		$this->assertSame(0, $data->getPointer());
		$this->assertSame(5, count($data->getDataTable()));
	}
}
