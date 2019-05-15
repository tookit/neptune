<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'required|unique:wl_cms.roles,name,'.$this->uniqueIdentifier(),
            'slug' => 'required|unique:wl_cms.roles,slug,'.$this->uniqueIdentifier(),
            'user_ids'=>'array'
        ];
    }


    public function attributes()
    {
        return [
            'slug' => '权限标识'
        ];
    }

    /**
     *  return the id of query path
     *  /role/{id}
     *
     * @return mixed null|integer
     */
    protected function uniqueIdentifier()
    {
        return $this->id;
    }


}
