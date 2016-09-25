<?php

namespace HeoMic\Serializer\Node;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
interface NodeInterface
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function canHandleValue($value);

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function handleValue($value);
}
