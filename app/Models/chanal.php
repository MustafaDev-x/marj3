<?php

namespace App\Models;
use App\Models\course;
use App\Models\chanal;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chanal extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'slug','image', 'url', 'user_id'];

    public function user()
    {

        return $this->belongsTo(User::class);
        
    }
    public function course()
    {

        return $this->belongsToMany(course::class);
        
    }

    public function Tag()
    {

        return $this->belongsToMany(Tag::class);
        
    }
}