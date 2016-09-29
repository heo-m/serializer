<?php

namespace Heomic\Serializer\Node;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class IntNode extends AbstractNode
{
    /**
     * {@inheritdoc}
     */
    public function canHandleValue($value)
    {
        return is_int($value) || $this->isNullable && $value === null;
    }

    /**
     * {@inheritdoc}
     */
    public function handleValue($value)
    {
        if ($value !== null) {
            return $this->formatter === null ? (int) $value : $this->formatter->format($value);
        }

        return null;
    }
}
