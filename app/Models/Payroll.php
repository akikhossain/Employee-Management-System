<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    // protected $fillable = ['user_id', 'salary_structure_id', 'hour'];

    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class, 'user_id');
    // }

    // public function salaryStructure()
    // {
    //     return $this->belongsTo(SalaryStructure::class);
    // }
}
