<?php

namespace baramous;

use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    protected $fillable = [
        'name', 'email','church','phone_number', 'father', 'birth_day','birth_month','birth_year','city', 'work','massage'
    ];
}
