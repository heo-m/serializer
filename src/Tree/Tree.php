<?php

namespace HeoMic\Serializer\Tree;

use HeoMic\Serializer\Node\NodeInterface;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
class Tree implements TreeInterface
{
    /**
     * @var NodeInterface
     */
    protected $rootNode;

    /**
     * @return NodeInterface
     */
    public function getRootNode()
    {
        return $this->rootNode;
    }

    /**
     * @param NodeInterface $rootNode
     *
     * @return Tree
     */
    public function setRootNode(NodeInterface $rootNode)
    {
        $this->rootNode = $rootNode;

        return $this->rootNode;
    }
}
