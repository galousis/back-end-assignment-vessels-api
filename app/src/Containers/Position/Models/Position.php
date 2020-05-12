<?php

namespace MarineTraffic\Containers\Vessel\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'Vessel_Position';
    protected $fillable = [
        'lat',
        'log',
        'heading',
        'course',
        'speed'
    ];
}