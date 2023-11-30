<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }
}
