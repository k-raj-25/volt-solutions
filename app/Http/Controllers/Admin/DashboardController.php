<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Post;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'published' => Post::where('status', 'published')->count(),
            'drafts' => Post::where('status', 'draft')->count(),
            'unread' => Message::where('is_read', false)->count(),
            'views' => Post::sum('view_count'),
            'recent' => Post::latest()->take(5)->get(),
        ]);
    }
}
