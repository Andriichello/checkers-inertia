<?php

namespace App\Http\Requests\Web\Auth;

use App\Http\Requests\BaseRequest;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest.
 */
class RegisterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique(User::class, 'email'),
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ],
        ];
    }
}
