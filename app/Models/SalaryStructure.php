<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryStructure extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = ['salary_class', 'basic_salary', 'mobile_bill', 'medical_expenses'];

    // public function payrolls()
    // {
    //     return $this->hasMany(Payroll::class);
    // }

    public function designations()
    {
        return $this->hasMany(Designation::class, 'salary_structure_id', 'id');
    }
}
