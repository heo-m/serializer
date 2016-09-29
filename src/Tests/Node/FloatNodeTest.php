<?php

namespace Heomic\Serializer\Tests\Node;

use Heomic\Serializer\Node\FloatNode;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class FloatNodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests values that can be passed to the node.
     */
    public function testCanHandleValue()
    {
        $node = new FloatNode();

        foreach ([0.0, 0, -1.2, 42232.42] as $val) {
            $this->assertTrue($node->canHandleValue($val), sprintf(
                'FloatNode::canHandle should allow the value %s.',
                $val
            ));
        }

        foreach ([1, true, false, null, (object) [], "foo"] as $val) {
            $this->assertFalse($node->canHandleValue($val));
        }

        $node->setIsNullable(true);
        $this->assertTrue($node->canHandleValue(null));
    }
}
