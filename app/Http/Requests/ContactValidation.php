<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactValidation extends FormRequest
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
            'email'=>'required|unique:contacts',
            'name'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ];
    }
    public function messages() {
        parent::messages();
        return [
            'email.required'=>'Plase Give Your Email. NT: Your Email Is not Shown',
            'name.required'=>'Please Type your Name',
            'Subject.required'=>'Give a Subject',
            'message.required'=>'Type Your Message Here'
            
        ];
    }
}
