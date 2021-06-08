<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opitemrece extends Model
{
   protected $connection = 'mysql2';
    protected $table = 'opitemrece';
    protected $primaryKey = 'hos_guid';
    public $timestamps = false;
}

