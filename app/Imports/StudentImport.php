<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements OnEachRow, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    /* public function model(array $row) */
    /* { */
		/* /1* echo '<pre>'; *1/ */
		/* /1* print_r($row); *1/ */
		/* /1* echo "</pre>"; *1/ */
		/* /1* die(); *1/ */

    /*     return new User([ */
    /*         'name' => $row['name'], */
    /*         'email' => $row['email'], */
    /*         'password' => $row['password'], */
    /*         'class_number' => $row['class_number'], */
    /*         'section_id' => $row['section_id'], */
    /*     ]); */
    /* } */

	public function onRow(\Maatwebsite\Excel\Row $row)
	{
		$row_array = $row->toArray();

        User::updateOrCreate(
            [
                'email' => $row_array['email'],
                'role_id' => config('constants.roles.student')
            ],
            [
                'name' => $row_array['name'],
                'password' => Hash::make($row_array['password']),
                'class_number' => $row_array['class_number'],
                'section_id' => $row_array['section_id'],
                'role_id' => config('constants.roles.student')
            ]
        );
	}
}
