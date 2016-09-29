<?php

namespace Heomic\Serializer;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
interface SerializerInterface
{
    /**
     * @param mixed $contents
     *
     * @return string
     */
    public function serialize($contents);
}
