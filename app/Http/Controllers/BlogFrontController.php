<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\PostArtile;

class BlogFrontController extends Controller
{

    public function index()
    {

        $post = PostArtile::all();
        return view('frontend.blog.index', compact('post'));
    }

    public function show($slug)
    {

        $post = PostArtile::with('category')->whereSlug($slug)->firstOrFail();

        return view('frontend.blog.showArticles', compact('post'));
    }

    public function showKategori($category)
    {

        $kategoriLink = Category::with('posts')->whereNamecategory($category)->firstOrFail();
        $kategori = $kategoriLink->nameCategory;

        $post = PostArtile::with('category')
            ->latest()
            ->whereHas('category', function ($query) use ($kategori) {
                $query->where('nameCategory', '=', $kategori);
            })->paginate(6);

        //dd($post);
        return view('frontend.blog.showCategory', compact('post', 'kategori'));
    }

    public function aboutMe()
    {
        return view('frontend.aboutMe.about');
    }
}
