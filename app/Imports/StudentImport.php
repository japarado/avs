<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Row;

class StudentImport implements WithHeadingRow, WithValidation, WithBatchInserts, OnEachRow
{
	public function onRow(Row $row)
	{
		$row = $row->toArray();
		$existing_user = User::where('email', $row['student_number'])->first();
		$altered_user = null;

		$values = [
			'name' => $row['name'],
			'password' => Hash::make($row['password']),
			'class_number' => $row['class_number'],
			'section_id' => $row['section_id'],
			'role_id' => config('constants.roles.student')
		];

		if($existing_user) {
			if($existing_user->role_id === config('constants.roles.student')) 
			{
				$existing_user->fill($values);
				$altered_user = $existing_user;
			}
		}
		else
		{
			$altered_user = new User();
			$altered_user->fill(array_merge(
				[
					'email' => $row['student_number'],
				],
				$values
			));
		}

		if($altered_user) 
		{
			$altered_user->save();
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
