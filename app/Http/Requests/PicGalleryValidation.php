<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PicGalleryValidation extends FormRequest
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
            'url'=>'required | max:191',
            'picture'=>'required'
        ];
    }
     public function messages() {
        parent::messages();
        return [
            'url.required'=>'You must have to fill the url Field',
        ];
    }
}
