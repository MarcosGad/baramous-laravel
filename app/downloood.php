<?php

namespace baramous;

use Illuminate\Database\Eloquent\Model;

class downloood extends Model
{
    protected $fillable = [
        'title','titlebtn','filename'
    ];

    public function getFeatruedAttribute($filename){
        return asset($filename);
    }
}
