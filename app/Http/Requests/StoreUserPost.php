<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
            'username'  => 'required|unique:users|max:120',
            'name'      => 'required|max:50',
            'last_name' => 'required|max:50',
            'rol'       => 'required',
            //'email'     => 'required|unique:users|max:120|email',
           // 'email'     => 'required|unique:users|max:120|email',
            'password'  => 'required|max:120'
        ];
    }
}
