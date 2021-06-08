<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'UNITS_ID';
    public $timestamps = false;
}
// protected $connection = 'mysql2';
// protected $table = 'person';
// protected $primaryKey = 'person_id';
// public $timestamps = false;
