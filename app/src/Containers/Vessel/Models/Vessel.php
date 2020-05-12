<?php

namespace MarineTraffic\Containers\Vessel\Models;

use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    protected $table = 'Vessels';
    protected $fillable = [
        'callsign',
        'length',
        'width',
        'draught',
        'mmsi',
        'imo'
    ];
    protected $casts = [
        'vessel_type_id'    => 'integer',
        'vessel_status_id'  => 'integer',
        'num_of_pages'      => 'integer',
    ];
}