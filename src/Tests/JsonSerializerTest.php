<?php

namespace HeoMic\Serializer\Tests;

use HeoMic\Serializer\JsonSerializer;
use HeoMic\Serializer\Walker\FlexibleWalker;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class JsonSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test serialization using FlexibleWalker.
     */
    public function testFlexSerializer()
    {
        $serializer = new JsonSerializer();
        $flexWalker = new FlexibleWalker();

        $testArr = [
            '{"foo":"bar"}' => (object) ['foo' => 'bar'],
            '{"foo":123}' => (object) ['foo' => 123],
            '{"foo":0}' => (object) ['foo' => 0],
            '{"foo":true}' => (object) ['foo' => false],
            '{"foo":true}' => (object) ['foo' => true],
            '{"foo":null}' => (object) ['foo' => null],
            '{"foo":{}}' => (object) ['foo' => (object) []],
            '{"foo":[]}' => (object) ['foo' => []],
            '{"foo":1.234}' => (object) ['foo' => 1.234],
            '[{"foo":1},{"bar":null}]' => [
                (object) ['foo' => 1],
                (object) ['bar' => null],
            ]
        ];

        foreach ($testArr as $expectedValue => $srcValue) {
            $this->assertEquals($expectedValue, $serializer->serialize(
                $srcValue,
                $flexWalker
            ));
        }
    }
}
