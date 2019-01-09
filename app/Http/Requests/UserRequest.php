<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'username' => 'bail|required|unique:users,username,'.$this->uniqueIdentifier(),
            'email' => 'required|email|unique:users,email,'.$this->uniqueIdentifier(),
            'mobile' => 'required|unique:users,mobile,'.$this->uniqueIdentifier(),
            'password' => 'required'
        ];
    }


    public function attributes()
    {
        return [];
    }


    /**
     * @return mixed null|integer
     */
    protected function uniqueIdentifier()
    {
        return $this->user;
    }
}
