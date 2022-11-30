<?php

namespace App\Exports;

use App\Law;
use Maatwebsite\Excel\Concerns\FromCollection;

class LawExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Law::all();
    }
}
