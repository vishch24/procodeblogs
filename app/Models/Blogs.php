<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'slug',
        'post_meta',
        'post_desc',
        'user_id',
        'tag_id',
        'cat_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        // return $this->belongsToMany(TargetModel::class, 'pivot_table', 'this_model_foreign_key', 'target_model_foreign_key');
        return $this->belongsToMany(Tags::class, 'blog_tag', 'blog_id', 'tag_id');
    }

    public function categories()
    {
        // return $this->belongsToMany(TargetModel::class, 'pivot_table', 'this_model_foreign_key', 'target_model_foreign_key');
        return $this->belongsToMany(Categories::class, 'blog_category', 'blog_id', 'cat_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'blog_id')->where('approved', 'yes')->whereNull('parent_id')->orderBy('created_at', 'desc');
    }
}
