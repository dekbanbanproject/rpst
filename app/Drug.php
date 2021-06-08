<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    // protected $connection = 'mysql-utf8';
    protected $table = 'clinic_drug';
    protected $primaryKey = 'DRUG_ID';

}
