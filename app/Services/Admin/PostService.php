<?php 

namespace App\Services\Admin;

use Auth;
use App\Models\Post;

class PostService
{
	/**
     * Get all posts.
     *
     * @return View
     */
    public function showPosts()
    {
		// Get current user id
		$currentUserId = Auth::user()->id;
        // Fetch posts from database
		$posts = Post::where('id', $currentUserId)->orderBy('created_at','DESC')->with('user')->paginate(10);
		// dd(Auth::user()->id);
		
		return view('admin.posts.index')->with('posts', $posts);
    }
}