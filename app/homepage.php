<?php

namespace baramous;

use Illuminate\Database\Eloquent\Model;

class homepage extends Model
{
    protected $fillable = [
        'title', 'description',
    ];
}
