<?php

namespace App\Http\Requests\Api\Crud;

use App\Http\Requests\BaseRequest;

/**
 * Class CrudRequest.
 */
class CrudRequest extends BaseRequest
{
    /**
     * Ability, which should be checked when
     * performing request.
     *
     * @var string|null
     */
    protected ?string $ability = null;

    /**
     * Get ability, which should be checked when
     * performing request.
     *
     * @return string|null
     */
    public function getAbility(): ?string
    {
        return $this->ability;
    }
}
