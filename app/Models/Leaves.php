<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Leaves extends Model
{
    use HasFactory;

    protected $fillable = [
        'employees_id',
        'start_leave',
        'end_leave',
        'leave_type',
        'status',
    ];
    public function employee()
    {
        return $this->belongsTo(employee::class, 'employees_id');
    }
}
