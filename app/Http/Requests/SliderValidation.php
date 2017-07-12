<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderValidation extends FormRequest
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
            'url'=>'required| max:191|unique:sliders',
            'title'=>'required | max:191',
            'picture'=>'required'
        ];
    }
    public function messages() {
        parent::messages();
        return [
           'url.required'=>'You must have to fill the url Field',
            'title.required'=>'You Should Give a Title For Slider',
        ];
    }
}
