<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drugitems extends Model
{
   protected $connection = 'mysql2';
    protected $table = 'drugitems';
    protected $primaryKey = 'icode';
    public $timestamps = false;
}

