<?php

namespace Heomic\Serializer\Node;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class StringNode extends AbstractNode
{
    /**
     * {@inheritdoc}
     */
    public function canHandleValue($value)
    {
        return is_string($value) || $this->isNullable && $value === null;
    }

    /**
     * @param mixed $value
     *
     * @return string|null
     */
    public function handleValue($value)
    {
        if ($value !== null) {
            return $this->formatter === null ? (string) $value : $this->formatter->format($value);
        }

        return null;
    }
}
