<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     *  regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/
     * @return array
     */
    public function rules()
    {

        return [
            'name'=>'required|unique:wl_cms.users,name,'.$this->uniqueIdentifier(),
            'email' => 'email|unique:wl_cms.users,email,'.$this->uniqueIdentifier(),
            'password'=>'min:6|confirmed',
            'is_active'=>'boolean'
        ];
    }


    public function attributes()
    {
        return [];
    }


    public function messages()
    {
        return [];
    }

    /**
     *  return the id parameter of query path
     *  /user/{id}
     *
     * @return mixed null|integer
     */
    protected function uniqueIdentifier()
    {
        return $this->id;
    }


}
