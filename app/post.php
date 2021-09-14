<?php

namespace baramous;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'title', 'description',
    ];
}
