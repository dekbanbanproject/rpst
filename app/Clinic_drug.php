<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic_drug extends Model
{
     protected $table = 'clinic_drug';
     protected $primaryKey = 'DRUG_ID';
     protected $fillable = ['DRUG_ID','DRUG_CODE','DRUG_NAME','DRUG_STRENGTH','DRUG_UNIT_PRICE','DRUG_UNIT','DRUG_STORE','DRUG_DID','THERAPEUTIC'];
}
