<?php

namespace HeoMic\Serializer\Node;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class BoolNode extends AbstractNode
{
    /**
     * {@inheritdoc}
     */
    public function canHandleValue($value)
    {
        return is_bool($value) || $this->isNullable && $value === null;
    }

    /**
     * {@inheritdoc}
     */
    public function handleValue($value)
    {
        if ($value !== null) {
            return $this->formatter === null ? (bool) $value : $this->formatter->format($value);
        }

        return null;
    }
}
