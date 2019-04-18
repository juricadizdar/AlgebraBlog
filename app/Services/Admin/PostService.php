<?php 

namespace App\Services\Admin;

use Auth;
use Exception;
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
	
	/**
     * Show the form for creating a new post.
     *
     * @return Redirect
     */
    public function createPost()
    {
		return view('admin.posts.create');
    }
	
	/**
     * Show a new post to storage.
     * @param App\Http\Request\PostRequest  $request
     * @return View
     */
    public function storePost($request)
    {
		// Get current user id
		$currentUserId = Auth::user()->id;
		// Fill array with data from request
		$data = [
			'title' => trim($request->get('title')),
			'content' => $request->get('content'),
			'image' => '',
			'user_id' => $currentUserId
		];
		
		// Instance post model
		$post = new Post();
		// Save new post
		try{
		  $postId = $post->savePost($data)->id;
		} catch(Exception $e){
		  session()->flash('error', $e->getMessage());
		  return redirect()->back();
		}
		
		dd($postId);
		return view('admin.posts.create');
    }
}








