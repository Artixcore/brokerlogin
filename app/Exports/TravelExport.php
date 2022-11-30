<?php

namespace App\Exports;

use App\Travel;
use Maatwebsite\Excel\Concerns\FromCollection;

class TravelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Travel::all();
    }
}
