<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    protected $fillable = ['id','title','body','cover_image','slug','meta_description','published_at','featured','author_id','category_id'];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class,'author_id')->withDefault('AdminUser');
    }

    public function category() : BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function tags() : BelongsToMany{
        return $this->belongsToMany(Tag::class,'post_tag');
    }

}
