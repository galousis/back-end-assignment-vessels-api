<?php

namespace MarineTraffic\Containers\Vessel\Models;

use Illuminate\Database\Eloquent\Model;

class VesselStatus extends Model
{
    protected $table = 'Vessel_Status';
    protected $fillable = [
        'status'
    ];
}