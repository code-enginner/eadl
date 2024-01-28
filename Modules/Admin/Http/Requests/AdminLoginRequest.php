<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $username
 * @property mixed $password
 * @property mixed $remember_me
 */
class AdminLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => 'bail|required|min:5',
            'password' => 'bail|required|min:5'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    public function messages(): array
    {
        return [
            'username.required' => 'وارد کردن ایمیل یا شماره همراه الزامی است',
            'username.min' => 'نام کاربری حداقل باید 5 کاراکتر داشته باشد',
            //
            'password.required' => 'وارد کردن رمز عبور الزامی است',
            'password.min' => 'رمز عبور حداقل باید 5 کاراکتر داشته باشد'
        ];
    }
}
