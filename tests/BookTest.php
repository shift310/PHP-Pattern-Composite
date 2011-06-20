<?php
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
	private $book;

	public function setUp()
	{
		$this->book = new Composite\Book("foo");
	}

	public function testBookContent()
	{
		$this->assertRegExp('/foo/', (string)$this->book);
	}
}