<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class form3Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required' , 'min:3'],
            'email'=>['required' ,'email', 'ends_with:@gmail.com'],
            'phone'=>['required','max:10'],
            'password'=>['required'  , 'confirmed']

        ];
    }

    public function attributes(){
        return [
            'name'=>'first name'        ];
    }

    public function messages(){
        return [
            'required'=>'the :attribute must be filled'  ,
            'email.required'=>'the :attribute can not be empty'        ];
    }
}
