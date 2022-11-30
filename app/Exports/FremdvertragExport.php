<?php

namespace App\Exports;

use App\Fremdvertrag;
use Maatwebsite\Excel\Concerns\FromCollection;

class FremdvertragExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fremdvertrag::all();
    }
}
