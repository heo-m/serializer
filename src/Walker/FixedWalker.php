<?php

namespace HeoMic\Serializer\Walker;

use HeoMic\Serializer\Tree\TreeInterface;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class FixedWalker extends AbstractWalker implements WalkerInterface
{
    /**
     * @var TreeInterface
     */
    protected $tree;

    /**
     * @param TreeInterface $tree
     */
    public function __construct(TreeInterface $tree)
    {
        $this->tree = $tree;
    }

    /**
     * {@inheritdoc}
     */
    public function walk($valueTree)
    {
        return $valueTree;
    }

    /**
     * @return TreeInterface
     */
    public function getTree()
    {
        return $this->tree;
    }

    /**
     * @param TreeInterface $tree
     *
     * @return FixedWalker
     */
    public function setTree(TreeInterface $tree)
    {
        $this->tree = $tree;

        return $this;
    }
}
