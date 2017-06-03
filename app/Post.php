<?php

    namespace App;

    use Carbon\Carbon;

    /**
     * App\Post
     *
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
     * @property-read \App\User                                               $user
     * @mixin \Eloquent
     */
    class Post extends Model
    {
        protected $fillable = ['title', 'body', 'user_id'];

        public static function archives()
        {
            return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                         ->groupBy('year', 'month')
                         ->orderByRaw('min(created_at)')
                         ->get()
                         ->toArray();
        }

        public function comments()
        {
            return $this->hasMany(Comment::class);
        }

        public function addComment($body)
        {
            $this->comments()
                 ->create(compact('body'));
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function scopeFilter($query, $filters)
        {
            if ($month = $filters[ 'month' ]) {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }

            if ($year = $filters[ 'year' ]) {
                $query->whereYear('created_at', Carbon::parse($year)->year);
            }
        }

        public function tags()
        {
            return $this->belongsToMany(Tag::class);
        }
    }
