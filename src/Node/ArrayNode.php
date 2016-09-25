<?php

namespace HeoMic\Serializer\Node;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class ArrayNode extends AbstractNode
{
    /**
     * @var array
     */
    protected $childNodes;

    /**
     * {@inheritdoc}
     */
    public function canHandleValue($value)
    {
        return is_array($value) || $this->isNullable && $value === null;
    }

    /**
     * {@inheritdoc}
     */
    public function handleValue($value)
    {
        return $value;
    }

    /**
     * @return array
     */
    public function getChildNodes()
    {
        return $this->childNodes;
    }

    /**
     * @param array $childNodes
     *
     * @return ArrayNode
     */
    public function setChildNodes(array $childNodes)
    {
        $this->childNodes = $childNodes;

        return $this;
    }
}
