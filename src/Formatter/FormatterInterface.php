<?php

namespace Heomic\Serializer\Formatter;

/**
 * @author Michał Hepner <michal.hepner@gmail.com>
 */
interface FormatterInterface
{
    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function format($value);
}
