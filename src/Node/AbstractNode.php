<?php

namespace Heomic\Serializer\Node;

use Heomic\Serializer\Formatter\FormatterInterface;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
abstract class AbstractNode implements NodeInterface
{
    /**
     * @var FormatterInterface
     */
    protected $formatter;

    /**
     * @var bool
     */
    protected $isNullable;

    /**
     * @return FormatterInterface
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * @param FormatterInterface $formatter
     *
     * @return AbstractNode
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsNullable()
    {
        return $this->isNullable;
    }

    /**
     * @param bool $isNullable
     *
     * @return AbstractNode
     */
    public function setIsNullable($isNullable)
    {
        $this->isNullable = $isNullable;

        return $this;
    }
}
