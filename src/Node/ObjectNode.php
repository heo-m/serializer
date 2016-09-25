<?php

namespace HeoMic\Serializer\Node;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class ObjectNode implements NodeInterface
{
    /**
     * {@inheritdoc}
     */
    public function canHandleValue($value)
    {
        return is_object($value) || $this->isNullable && $value === null;
    }

    /**
     * {@inheritdoc}
     */
    public function handleValue($value)
    {
        return $value;
    }
}
