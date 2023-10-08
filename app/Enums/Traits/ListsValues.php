<?php

namespace App\Enums\Traits;

/**
 * Trait ListsValues.
 */
trait ListsValues
{
    /**
     * Get list of enum names.
     *
     * @return array
     */
    public function names(): array
    {
        return array_column(static::cases(), 'name');
    }

    /**
     * Get list of enum values.
     *
     * @return array
     */
    public function values(): array
    {
        return array_column(static::cases(), 'value');
    }

    /**
     * Get list of enum names to values.
     *
     * @return array
     */
    public function list(): array
    {
        $list = [];

        foreach (static::cases() as $case) {
            $list[$case->name] = $case->value;
        }

        return $list;
    }
}
