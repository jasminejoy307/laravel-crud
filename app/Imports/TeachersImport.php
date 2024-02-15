<?php

namespace App\Imports;

use App\Models\Teachers;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TeachersImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    
    private $rows = 0;

    public function model(array $row)
    {
        ++$this->rows;
        return new Teachers([
            'name'    => $row['name'],
            'dep_id'   => $row['department'],
            'email'    => $row['email'],
            'phone'  => $row['phone'],
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => Rule::unique('teachers', 'email'),
            'department' => ['required'],
        ];
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}