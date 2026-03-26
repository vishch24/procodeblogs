<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    protected static function newFactory()
    {
        return \Database\Factories\CategoriesFactory::new();
    }

    public function blogs()
    {
        // return $this->belongsToMany(TargetModel::class, 'pivot_table', 'this_model_foreign_key', 'target_model_foreign_key');
        return $this->belongsToMany(Blogs::class, 'blog_category', 'cat_id', 'blog_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
