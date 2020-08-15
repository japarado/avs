<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class StudentImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts
{
    use Importable;
    public function model(array $row)
    {
        $user = User::updateOrCreate(
            [
                'email' => $row['email'],
                'role_id' => config('constants.roles.student')
            ],
            [
                'name' => $row['name'],
                'password' => Hash::make($row['password']),
                'class_number' => $row['class_number'],
                'section_id' => $row['section_id'],
                'role_id' => config('constants.roles.student')
            ]
        );
    }

    public function rules(): array
    {
        return [
            'email' => 'email|required|unique:user',
			'name' => 'required',
			'password' => 'required'
        ];
    }

	public function batchSize(): int
	{
		return 500;
	}
}
