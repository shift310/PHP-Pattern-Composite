<?php
use Composite\Node;
use PHPUnit\Framework\TestCase;

class NodeTest extends TestCase
{
	private $node;

	public function setUp()
	{
		$this->node = $this->getMockForAbstractClass(Node::class);
	}

	public function testAddingNodeChildrenPlayingWithArrayObjectAPI()
	{
		$this->node->addNode($secondNode = clone $this->node);
		$this->assertCount(1, $this->node);
		$this->node[] = clone $this->node;
		$this->assertCount(2, $this->node);
		$this->assertSame($secondNode, $this->node[0]);
	}

	public function testAggregatedContent()
	{
		$this->node->expects($this->any())
		            ->method('getContent')
		            ->willReturn("foobar");
		$this->node->addNode(clone $this->node);
		$this->assertEquals('foobar'.PHP_EOL.'foobar', (string)$this->node);
	}
}