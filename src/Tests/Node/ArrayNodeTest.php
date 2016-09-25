<?php

namespace HeoMic\Serializer\Tests\Node;

use HeoMic\Serializer\Node\ArrayNode;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class ArrayNodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests values that can be passed to the node.
     */
    public function testCanHandleValue()
    {
        $node = new ArrayNode();

        $this->assertTrue($node->canHandleValue([]));

        foreach ([1, null, false, true, (object) [], 1.234, "foo"] as $val) {
            $this->assertFalse($node->canHandleValue($val));
        }

        $node->setIsNullable(true);
        $this->assertTrue($node->canHandleValue(null));
    }
}
