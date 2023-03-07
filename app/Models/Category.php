<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =['name'];
    protected $with = ['sub_category'];

    public function ads(){
        return $this->belongsToMany(Ads::class, 'ads_category');
    }

    public function sub_category(){
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
