<?php

namespace App\Exports;

use App\Rent;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportrentexportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rent::all();
    }
}
