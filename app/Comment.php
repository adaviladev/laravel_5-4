<?php

	namespace App;

	/**
 * App\Comment
 *
 * @property-read \App\Post $post
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class Comment extends Model {
		public function post() {
			return $this->belongsTo( Post::class );
		}

		public function user() {
			return $this->belongsTo(User::class);
		}
	}
