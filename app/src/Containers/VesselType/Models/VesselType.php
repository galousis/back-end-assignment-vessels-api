<?php

namespace MarineTraffic\Containers\Vessel\Models;

use Illuminate\Database\Eloquent\Model;

class VesselType extends Model
{
    protected $table = 'Vessel_Type';
    protected $fillable = [
        'type'
    ];
}