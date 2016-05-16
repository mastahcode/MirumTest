<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\PostArtile;

class BlogRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $posts = PostArtile::find($this->blog);
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'title'         =>  'required|unique:posts|max:50',
                    'description'   =>  'required|min:10',
                    'content'       =>  'required|min:20',
                    'category'      =>  'required',
                    'image'         =>  'mimes:jpeg,png|max:1000px'
                ];
            }

            case 'PATCH':
            {
                return [
                    'title'         =>  'required|unique:posts,title,'.$posts->id.'|max:50',
                    'description'   =>  'required|min:10',
                    'content'       =>  'required|min:20',
                    'category'      =>  'required',
                    'image'         =>  'mimes:jpeg,png|max:1000px'
                ];
            }
        }
    }
}
