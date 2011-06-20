<?php
use PHPUnit\Framework\TestCase;

class LineTest extends TestCase
{
	private $line;

	public function setUp()
	{
		$this->line = new Composite\Line;
	}

	public function testLineCantHaveChildren()
	{
		$this->expectException(\DomainException::class);
		$this->expectExceptionMessage('children');
		$this->line->addNode(new Composite\Line);
	}

	public function testLineContent()
	{
		$this->assertEquals("<hr>", (string)$this->line);
	}
}