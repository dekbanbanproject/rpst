<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pttype extends Model
{
    protected $connection = 'mysql2';
     protected $table = 'pttype';
     protected $primaryKey = 'pttype';
    public $timestamps = false;
}
