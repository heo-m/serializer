<?php

namespace HeoMic\Serializer\Tests\Node;

use HeoMic\Serializer\Node\IntNode;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class IntNodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests values that can be passed to the node.
     */
    public function testCanHandleValue()
    {
        $node = new IntNode();

        foreach ([4321, 0, -32132] as $val) {
            $this->assertTrue($node->canHandleValue($val), sprintf(
                'IntNode::canHandle should allow the int value: \'%s\'.',
                $val
            ));
        }

        foreach ([true, false, null, (object) [], 1.443, 0.0] as $val) {
            $this->assertFalse($node->canHandleValue($val));
        }

        $node->setIsNullable(true);
        $this->assertTrue($node->canHandleValue(null));
    }
}
