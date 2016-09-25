<?php

namespace HeoMic\Serializer\Node;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class FloatNode extends AbstractNode
{
    /**
     * {@inheritdoc}
     */
    public function canHandleValue($value)
    {
        return is_float($value) || $value === 0 || $this->isNullable && $value === null;
    }

    /**
     * {@inheritdoc}
     */
    public function handleValue($value)
    {
        if ($value !== null) {
            return $this->formatter === null ? (float) $value : $this->formatter->format($value);
        }

        return null;
    }
}
