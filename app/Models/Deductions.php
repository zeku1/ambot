<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deductions extends Model
{
    use HasFactory;
    protected $fillable = [
        'employees_id',
        'type_of_deductions',
        'amount',
        'date'

    ];
    public function employee()
    {
        return $this->belongsTo(employee::class, 'employees_id');
    }
}
