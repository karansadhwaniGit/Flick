<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|unique:posts|max:255',
            'excerpt'=>'required|max:255',
            'content'=>'required',
            'category_id'=>'required|exists:categories,id',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'tags'=>'required|exists:tags,id'
        ];
    }
}
