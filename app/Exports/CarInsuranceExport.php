<?php

namespace App\Exports;

use App\CarInsurance;
use Maatwebsite\Excel\Concerns\FromCollection;

class CarInsuranceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CarInsurance::all();
    }
}
