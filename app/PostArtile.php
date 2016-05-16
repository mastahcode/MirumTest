<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostArtile extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title','description', 'content', 'image','user_id','slug'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsToMany(Category::class,'detail_category','posts_id','category_id')->withTimestamps();
    }
}
