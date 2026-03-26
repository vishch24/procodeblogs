<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    protected static function newFactory()
    {
        return \Database\Factories\TagsFactory::new();
    }

    public function blogs()
    {
        // return $this->belongsToMany(TargetModel::class, 'pivot_table', 'this_model_foreign_key', 'target_model_foreign_key');
        return $this->belongsToMany(Blogs::class, 'blog_tag', 'tag_id', 'blog_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
