<?php

namespace App\Http\Requests\Api\Game;

use App\Http\Requests\Api\Crud\IndexRequest;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Class IndexGameRequest.
 */
class IndexGameRequest extends IndexRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return array_merge(
            parent::rules(),
            [
                //
            ]
        );
    }
}
