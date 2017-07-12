<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidation extends FormRequest
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
            'title'=>'required|max:191|unique:posts',
            'desrc'=>'required',
            'tags' =>'required',
            'categoriesid' => 'required',
            'publicationid' => 'required',
            'picture'=>'required | mimes:jpeg,jpg,png,jpg,bmp,gif | max:2450'
        ];
        
    }
    public function messages() {
        parent::messages();
        return[
          'title.required' => 'The Title Could Not Be Empty And  Max Length 191 Charecter'  ,
            'desrc.required' => 'Description Must Not Be Empty. Fill The The Description Minimum 200 Character',
            'tags.required'=>'Please Give A Tag Name Of The Post',
            'Categoriesid.required'=>'Please Select A Category',
            'publicationid.required'=>'Please Select This is Published Now Or Later',
            'picture.required'=>'Please Select A Picture And It Should be in Jpg,Png,Gif Format And Max Size is 2MB'
            
        ];
    }
}
