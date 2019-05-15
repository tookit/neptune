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

        return [
            'title' => 'required',
            'uri' => 'required|unique:wl_cms.menus,uri,'.$this->uniqueIdentifier(),
        ];
    }


    public function attributes()
    {
        return [
            'title'=>'菜单名称',
//            'parent_id'=>'上级菜单',
            'uri'=>'菜单路由',
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
     *  /menu/{id}
     *
     * @return mixed null|integer
     */
    protected function uniqueIdentifier()
    {
        return $this->id;
    }

}
