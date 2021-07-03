<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title'=>'required|max:255|unique:posts,title,'.$this->post->id,
            'excerpt'=>'required|max:255',
            'content'=>'required|max:255',
            'category_id'=>'required|exists:categories,id',
            'tags'=>'required|exists:tags,id'
        ];
    }
}
