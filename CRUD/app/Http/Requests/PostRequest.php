<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $imgRules =['nullable','image','mimes:png,jpg'];
        // dd($this->method());
        if($this->method()=='POST'){
            $imgRules = ['required','image','mimes:png,jpg'];
        }
        return [
            'title'=>['required'],
            'image'=>$imgRules,
            'content'=>['required']
        ];
    }
}
