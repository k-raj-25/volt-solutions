<?php

namespace App\Http\Controllers;

use App\Models\Post;

class SitemapController extends Controller
{
    public function __invoke()
    {
        $pages = ['home', 'about', 'loans', 'real-estate', 'blog.index', 'contact', 'careers', 'privacy', 'terms', 'sitemap'];
        $posts = Post::published()->latest('published_at')->get();

        return response()->view('pages.sitemap-xml', compact('pages', 'posts'))
            ->header('Content-Type', 'application/xml');
    }
}
