<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'person';
    protected $primaryKey = 'PERSON_ID';
    public $timestamps = false;
}
