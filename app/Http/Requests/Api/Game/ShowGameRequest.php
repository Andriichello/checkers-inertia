<?php

namespace App\Http\Requests\Api\Game;

use App\Http\Requests\Api\Crud\IndexRequest;
use App\Http\Requests\Api\Crud\ShowRequest;
use App\Http\Requests\Api\Traits\WithTarget;
use App\Models\Game;
use Exception;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Class ShowGameRequest.
 */
class ShowGameRequest extends ShowRequest
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

