<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class StudentImport implements ToCollection, WithHeadingRow, WithValidation, WithBatchInserts
{
    use Importable;

	public function collection(Collection $collection)
	{

		$is_valid = Validator::make($collection->toArray(), [
			'student_number' => 'required',
			'name' => 'required',
			'password' => 'required',
			'class_number' => 'required',
			'section_id' => 'required',
		])->validate();
		foreach($collection as $row)
		{


			die($is_valid);

			$return_value = null;
			$values = [
				'name' => $row['name'],
				'password' => Hash::make($row['password']),
				'class_number' => $row['class_number'],
				'section_id' => $row['section_id'],
				'role_id' => config('constants.roles.student')
			];

			$existing_user = User::firstOrNew(
				[
					'email' => $row['student_number']
				],
				$values
			);

			if($existing_user->role_id !== config('constants.roles.admin'))
			{
				$existing_user->fill(array_merge(
					[
						'role_id' => config('constants.roles.student'),
					],
					$values
				));
				$return_value = $existing_user;
			}

			if($return_value)
			{
				$return_value->save();
			}
		}
	}


    public function rules(): array
    {
        return [
            'student_number' => 'required',
            'name' => 'required',
            'password' => 'required',
            'section_id' => 'exists:section,id'
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }
}
