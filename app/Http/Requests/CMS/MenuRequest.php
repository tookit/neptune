<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
//            'title'=>'菜单名称',
//            'uri'=>'菜单路由',
        ];
    }


    public function messages()
    {
        return [

//            'title.required' => '请输入菜单名称',
//            'uri.required' => '请输入菜单路由'
        ];
    }

    /**
     *  return the id of query path
     *  /menus/{id}
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
            'name' => 'required|unique:menus,name',
            'uri' => 'required',
            'sort_number'=>'integer',
            'is_active'=>'boolean',
        ];

    }

    protected function updateRules()
    {
        return [
            'name' => 'required|unique:menus,name,'.$this->uniqueIdentifier(),
            'uri' => 'max:255',
            'sort_number'=>'integer',
            'is_active'=>'boolean',
        ];
    }

}
