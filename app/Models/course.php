<?php

namespace App\Models;
use App\Models\course;
use App\Models\chanal;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable = ['c_name', 'slug', 'url', 'chanal_id', 'user_id'];

    public function user()
    {

        return $this->belongsTo(User::class);
        
    }
    
    public function chanal()
    {

        return $this->belongsTo(chanal::class);
        
    }

    public function Tag()
    {

        return $this->belongsToMany(Tag::class);
        
    }
}