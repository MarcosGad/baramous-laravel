<?php

namespace baramous;

use Illuminate\Database\Eloquent\Model;

class massage extends Model
{
    protected $fillable = [
        'title','massage_state','massage','user_id',
    ];
}
