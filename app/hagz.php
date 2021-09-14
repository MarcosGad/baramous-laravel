<?php

namespace baramous;

use Illuminate\Database\Eloquent\Model;

class hagz extends Model
{
    

    protected $fillable = [
        'name', 'email','church','phone_number', 'father', 'birth_day','birth_month','birth_year','city', 'work','date_of_hagz','per_number', 'note', 'state', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('baramous\User');
    }
    
}
