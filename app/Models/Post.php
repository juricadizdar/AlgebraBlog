<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
	protected $fillable = 
		[
			'title',
			'content',
			'image',
			'user_id'
		];
		
	/* Save new post
	 * @param arrya $data
	 * @return Post
	*/
	
	public function savePost($data)
	{
		return $this->create($data);
	}
	
	/* Update post
	 * @param arrya $data
	 * @return void
	*/
	
	public function updatePost($data)
	{
		$this->update($data);
	}
	
	public function user()
	{
		return $this->belongsTo('\App\User');
	}
}
