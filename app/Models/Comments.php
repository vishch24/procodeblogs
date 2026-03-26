<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'if_author',
        'user_id',
        'name',
        'email',
        'description',
        'parent_id',
        'approved'
    ];

    protected static function newFactory()
    {
        return \Database\Factories\CommentsFactory::new();
    }

    // Relationship with Blog
    public function blog()
    {
        return $this->belongsTo(Blogs::class);
    }

    // Relationship with User (Nullable)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Parent Comment Relationship (Reply belongs to a Parent Comment)
    public function parent()
    {
        return $this->belongsTo(Comments::class, 'parent_id');
    }

    // Child Comments Relationship (A Comment can have many replies)
    public function replies()
    {
        return $this->hasMany(Comments::class, 'parent_id')->where('approved', 'yes')->orderBy('created_at', 'desc')->with('replies'); // Recursive
    }
}
