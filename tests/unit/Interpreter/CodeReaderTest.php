<?php

declare(strict_types=1);

use AdrienNf\BrainfuckInterpreter\Interpreter\CodeReader;
use PHPUnit\Framework\TestCase;

final class CodeReaderTest extends TestCase
{
	protected static string $code;

	public static function setUpBeforeClass(): void
	{
		static::$code = "+++[->+<]-+";
	}

	public function testReaderShouldReadCharsOneByOne(): void
	{
		$reader = new CodeReader(static::$code);

		foreach (str_split(static::$code) as $char) {
			$this->assertSame($char, $reader->read());
		}
	}

	public function testReaderShouldReturnNullIfTooLong(): void
	{
		$reader = new CodeReader(static::$code);

		foreach (str_split(static::$code) as $char) {
			$this->assertSame($char, $reader->read());
		}

		$this->assertNull($reader->read());
	}
}
