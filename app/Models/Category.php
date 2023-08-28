<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['id','slug','name','parent_id'];

public function posts(): HasMany{

    return $this->hasMany(Post::class);
}

public function SubCategories(): HasMany{
    return $this->hasMany(Category::class,'parent_id');
}

}
