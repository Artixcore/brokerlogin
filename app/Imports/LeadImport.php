<?php

namespace App\Imports;

use App\Lead;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeadImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

            return new Lead([

                'f_name' => $row["f_name"],
                'l_name' => $row["l_name"],
                'street' => $row["street"],
                'zip' => $row["zip"],
                'place' => $row["place"],
                'phone' => $row["phone"],
                'email' => $row["email"],
                'date_of_birth' => $row["date_of_birth"],
                'current_insurance' => $row["current_insurance"],
                'number_of_person' => $row["number_of_person"],

        ]);
    }
}
