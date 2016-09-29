<?php

namespace Heomic\Serializer\Tests\Node;

use Heomic\Serializer\Node\BoolNode;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class BoolNodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests values that can be passed to the node.
     */
    public function testCanHandleValue()
    {
        $node = new BoolNode();

        $this->assertTrue($node->canHandleValue(true));
        $this->assertTrue($node->canHandleValue(false));

        foreach ([1, null, (object) [], 1.234, "foo"] as $val) {
            $this->assertFalse($node->canHandleValue($val));
        }

        $node->setIsNullable(true);
        $this->assertTrue($node->canHandleValue(null));
    }
}
