<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function posts(){
        return $this->belongsToMany(PostArtile::class,'detail_category','posts_id','category_id')->withTimestamps();;
    }
}
