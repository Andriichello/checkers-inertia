<?php

namespace App\Enums\Interfaces;

/**
 * Interface ListsValuesInterface.
 */
interface ListsValuesInterface
{
    /**
     * Get list of enum names.
     *
     * @return array
     */
    public function names(): array;

    /**
     * Get list of enum values.
     *
     * @return array
     */
    public function values(): array;

    /**
     * Get list of enum names to values.
     *
     * @return array
     */
    public function list(): array;
}
