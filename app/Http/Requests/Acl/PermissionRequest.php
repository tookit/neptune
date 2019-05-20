<?php

namespace App\Http\Requests\Acl;

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

        return ($this->uniqueIdentifier()) ? $this->updateRules() : $this->createRules();
    }


    public function attributes()
    {
        return [

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



    protected function createRules()
    {
        return [
            'name' => 'required|unique:permissions,name',
            'slug' => 'required|unique:permissions,slug',
            'http_methods'=>'array',
            'http_methods.*'=>'in:*,GET,POST,PATCH,DELETE,PUT,OPTION',
            'http_paths'=>'array',
        ];

    }

    protected function updateRules()
    {
        return [
            'name' => 'unique:permissions,name,'.$this->uniqueIdentifier(),
            'slug' => 'unique:wl_cms.permissions,slug,'.$this->uniqueIdentifier(),
            'http_methods'=>'array',
            'http_methods.*'=>'in:*,GET,POST,PATCH,DELETE,PUT,OPTION',
            'http_paths'=>'array',
        ];
    }
}
