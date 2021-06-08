<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    protected $table = 'supplies';
    protected $primaryKey = 'SUP_ID';
    public $timestamps = false;
}