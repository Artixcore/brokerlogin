<?php

namespace App\Exports;

use App\HomeInsurance;
use Maatwebsite\Excel\Concerns\FromCollection;

class HomeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return HomeInsurance::all();
    }
}
