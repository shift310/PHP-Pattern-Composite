<?php
use Composite\HtmlElements\BaseHtmlElement;
use PHPUnit\Framework\TestCase;

class BaseHtmlElementTest extends TestCase
{
	private $htmlElement;

	const HTML_TEXT = "foo";

	public function setUp()
	{
		$this->htmlElement = $this->getMockForAbstractClass(BaseHtmlElement::class, [self::HTML_TEXT]);
	}

	public function assertPreConditions()
	{
		$this->assertEquals(self::HTML_TEXT, $this->htmlElement->getText());
	}

	public function testTagFormattingOutput()
	{
		$this->htmlElement->expects($this->any())
		                   ->method('getTag')
		                   ->willReturn('fooTag');

		$this->assertEquals('<fooTag>'.self::HTML_TEXT.'</fooTag>', $this->htmlElement->getContent());
	}
}