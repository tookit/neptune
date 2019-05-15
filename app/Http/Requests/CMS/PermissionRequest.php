<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => 'required|unique:wl_cms.permissions,name,'.$this->uniqueIdentifier(),
            'slug' => 'required|unique:wl_cms.permissions,slug,'.$this->uniqueIdentifier(),
            'http_method'=>'array',
            'http_method.*'=>'in:*,GET,POST,PATCH,DELETE,PUT,OPTION',
            'http_path'=>'array',
            'role_ids' => 'array'
        ];
    }


    public function attributes()
    {
        return [
            'slug' => '权限标识',
            'http_method.*' => 'HTTP请求方法'
        ];
    }

    /**
     *  return the id of query path
     *  /permission/{id}
     *
     * @return mixed null|integer
     */
    protected function uniqueIdentifier()
    {
        return $this->id;
    }


}
