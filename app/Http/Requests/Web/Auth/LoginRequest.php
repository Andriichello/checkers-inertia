<?php

namespace App\Http\Requests\Web\Auth;

use App\Http\Requests\BaseRequest;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

/**
 * Class LoginRequest.
 */
class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::exists(User::class, 'email'),
            ],
            'password' => [
                'required',
                'string',
                'min:1',
            ],
        ];
    }
}
