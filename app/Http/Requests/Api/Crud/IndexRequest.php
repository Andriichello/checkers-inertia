<?php

namespace App\Http\Requests\Api\Crud;

/**
 * Class IndexRequest.
 */
class IndexRequest extends CrudRequest
{
    /**
     * Ability, which should be checked when
     * performing request.
     *
     * @var string|null
     */
    protected ?string $ability = 'index';
}
