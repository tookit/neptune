<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'channel_id'=>'integer',
            'name'=>'required|unique:wl_cms.users,name,'.$this->uniqueIdentifier(),
//            'email' => 'email|unique:wl_cms.users,email,'.$this->uniqueIdentifier(),
            'password'=>'required||min:6|confirmed',
            'is_active'=>'required',
            'role_ids'=>'array'
        ];
    }


    public function attributes()
    {
        return [
            'channel_id'=>'渠道',
            'name'=>'用户名',
            'email'=>"邮箱"
        ];
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
