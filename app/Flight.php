<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{

    use SoftDeletes;
    // we use softdeletes to make temporary deletes

    protected $table = 'my_flights';

    // $flight->restore();
    // we use this to restore a softe deleted model
    // 
    public $timestamps = false;
    // if we do not wish to have these columns automatically managed


}
