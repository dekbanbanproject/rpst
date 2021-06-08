<?php

namespace App\Imports;

use App\Clinic_drug;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Drugimport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clinic_drug([
            'DRUG_CODE' => $row['icode'],
            'DRUG_NAME' => $row['name'],
            'DRUG_STRENGTH' => $row['strength'],
            'DRUG_UNIT_PRICE' => $row['drug_unit_price'],
            'DRUG_UNIT' => $row['drug_unit'],
            'DRUG_STORE' => $row['store'],
            'DRUG_DID' => $row['did'],
            'THERAPEUTIC' => $row['therapeutic'],
        ]);
    }
}
