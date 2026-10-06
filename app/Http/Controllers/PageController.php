<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PageController extends Controller
{
    public function home()
    {
        $posts = Post::published()->latest('published_at')->take(3)->get();

        return view('pages.home', compact('posts'));
    }

    public function about() { return view('pages.about'); }
    public function loans() { return view('pages.loans'); }
    public function realEstate() { return view('pages.real-estate'); }
    public function careers() { return view('pages.careers'); }
    public function privacy() { return view('pages.privacy'); }
    public function terms() { return view('pages.terms'); }

    public function sitemap()
    {
        $posts = Post::published()->latest('published_at')->get(['title', 'slug']);

        return view('pages.sitemap', compact('posts'));
    }
}
