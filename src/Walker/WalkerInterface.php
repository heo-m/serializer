<?php

namespace HeoMic\Serializer\Walker;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
interface WalkerInterface
{
    /**
     * Walks through the provided value tree.
     *
     * @param mixed $valueTree
     *
     * @return mixed
     */
    public function walk($valueTree);
}
