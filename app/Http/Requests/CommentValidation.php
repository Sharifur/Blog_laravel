<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required | email',
            'website' => 'required | unique:comments',
            'message' => 'required | max: 100'
             
        ];
    }
    public function messages() {
        parent::messages();
        return[
            'name.required' => 'Type Your Name',
            'email.required' => 'Your Email Not Shown',
            'website.required' => 'your website link or your facebook profile link',
            'message.required' => 'Please write minimum 100 '
        ];
    }
}
