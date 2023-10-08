<?php

namespace App\Http\Requests\Api\Crud;

use App\Http\Requests\Api\Interfaces\WithTargetInterface;
use App\Http\Requests\Api\Traits\WithTarget;

/**
 * Class ShowRequest.
 */
class ShowRequest extends CrudRequest implements WithTargetInterface
{
    use WithTarget;

    /**
     * Ability, which should be checked when
     * performing request.
     *
     * @var string|null
     */
    protected ?string $ability = 'show';
}
