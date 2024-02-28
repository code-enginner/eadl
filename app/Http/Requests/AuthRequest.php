<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           /* 'office' => 'required|regex:/^[0-9]+$/',
            // 'oper' => 'required|regex:/^[0-9a-zA-Z]+$/',
            'oper' => 'required',
            'ver_code' => 'required|regex:/^[0-9a-zA-Z]+$/',
            'nc' => 'required|regex:/^[0-9a-zA-Z]+$/',*/
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        abort(404);
    }
}
