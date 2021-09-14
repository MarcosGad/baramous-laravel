<?php

namespace baramous;

use Illuminate\Database\Eloquent\Model;

class dayof extends Model
{
    protected $fillable = [
        'day_of_one','day_of_two','day_of_three','day_of_four','day_of_five','day_of_six','day_of_seven','day_of_from_one','day_of_to_one','day_of_from_two','day_of_to_two','day_of_from_three','day_of_to_three','day_of_from_four','day_of_to_four','day_of_from_five','day_of_to_five','day_of_from_six','day_of_to_six','day_of_from_seven','day_of_to_seven',
    ];
}
