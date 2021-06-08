<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic_category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'CAT_ID';
    public $timestamps = false;
}
