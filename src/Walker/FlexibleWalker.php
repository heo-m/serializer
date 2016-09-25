<?php

namespace HeoMic\Serializer\Walker;

use HeoMic\Serializer\Node\NodeInterface;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class FlexibleWalker extends AbstractWalker implements WalkerInterface
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
