<?php

namespace App\Http\Requests\Acl;

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
        return ($this->uniqueIdentifier()) ? $this->updateRules() : $this->createRules();
    }


    public function attributes()
    {
        return [
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


    protected function createRules()
    {
        return [
            'name' => 'required|unique:roles,name',
            'slug' => 'required|unique:roles,slug',
            'user_ids'=>'array'
        ];

    }

    protected function updateRules()
    {
        return [
            'name' => 'unique:roles,name,'.$this->uniqueIdentifier(),
            'slug' => 'unique:roles,slug,'.$this->uniqueIdentifier(),
            'user_ids'=>'array'
        ];
    }


}
