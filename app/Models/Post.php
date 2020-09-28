<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $primaryKey = "id";

    protected $fillable = [
        "author",
        "post_img",
        "content"
    ];

    public function comment()
    {
        return $this->hasOne("App\Models\Comment");
    }

    public function comments()
    {
        return $this->hasMany("App\Models\Comment");
    }

    public function author()
    {
        return $this->belongsTo("App\Models\User");
    }
}
