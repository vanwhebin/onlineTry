<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends BaseModel
{
    use HasFactory;

//    protected $appends = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }

//    public function getCategoryNameAttribute()
//    {
//        return Category::where('id', $this->attributes['category_id'])->value('name');
//    }


    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }




}
