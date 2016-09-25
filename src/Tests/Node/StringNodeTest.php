<?php

namespace HeoMic\Serializer\Tests\Node;

use HeoMic\Serializer\Node\StringNode;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class StringNodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests values that can be passed to the node.
     */
    public function testCanHandleValue()
    {
        $node = new StringNode();

        foreach (['', 'foobar'] as $val) {
            $this->assertTrue($node->canHandleValue($val), sprintf(
                'StringNode::canHandle should allow the string value: \'%s\'.',
                $val
            ));
        }

        foreach ([1, true, false, null, (object) [], 1.443, 0] as $val) {
            $this->assertFalse($node->canHandleValue($val));
        }

        $node->setIsNullable(true);
        $this->assertTrue($node->canHandleValue(null));
    }
}
