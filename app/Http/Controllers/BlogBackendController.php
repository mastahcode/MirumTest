<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\BlogRequest;
use App\PostArtile;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class BlogBackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $article = PostArtile::all();
        return view('backend.blog.indexBackBlog',compact('article'));
    }

    public function create()
    {

        $category = Category::lists('nameCategory', 'id');

        return view('backend.blog.createBlog', compact('category'));
    }

    public function store(BlogRequest $request)
    {

        $images = Input::file('image');

        if ($images == null) {
            $cariFileName = 'default.png';
        } else {
            $cariFileName = $images->getClientOriginalName();
        }

        $filename = $cariFileName;
        if ($images != null) {
            $path = public_path('assets/img/article/' . $filename);
            Image::make($images->getRealPath())->resize(900, 300)->save($path);
        }

        $posts = new PostArtile($request->all());
        $posts->user_id = Auth::user()->id;
        $posts->title = Input::get('title');
        $posts->slug = Str::slug(Input::get('title'));
        $posts->description = Input::get('description');
        $posts->content = Input::get('content');
        $posts->image = $filename;

        $posts->save();

        $posts->category()->attach($request->input('category'));
        flash()->success('article sukses di simpan');
        return redirect(url(action('BlogBackendController@create')));
    }

}
