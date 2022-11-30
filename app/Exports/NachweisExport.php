<?php

namespace App\Exports;

use App\Nachweis;
use Maatwebsite\Excel\Concerns\FromCollection;

class NachweisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nachweis::all();
    }
}
