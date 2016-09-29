<?php

namespace Heomic\Serializer\Walker;

use Heomic\Serializer\Node\NodeInterface;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class FlexWalker extends AbstractWalker implements WalkerInterface
{
    /**
     * {@inheritdoc}
     */
    public function walk($valueTree)
    {
        return $valueTree;
    }

    /**
     * {@inheritdoc}
     */
    public function decomposeValue($value, NodeInterface $node = null)
    {
        return $value;
    }
}
