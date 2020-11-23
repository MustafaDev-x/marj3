<?php

namespace App\Models;
use App\Models\course;
use App\Models\chanal;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function course()
    {

        return $this->belongsToMany(course::class);
        
    }

    public function chanal()
    {

        return $this->belongsToMany(chanal::class);
        
    }
}