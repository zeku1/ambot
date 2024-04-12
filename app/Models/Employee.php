<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Designation;
use App\Models\AssignDesignation;
use App\Models\Department;


class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_number',
        'firstname',
        'middlename',
        'lastname',
        'addressline',
        'barangay',
        'province',
        'country',
        'zipcode',
    ];

    public function designation()
    {
        return $this->hasOneThrough(Designation::class, AssignDesignation::class, 'employee_number', 'id', 'employee_number', 'designation_id');
    }

    public function assignDesignation()
    {
        return $this->hasOne(AssignDesignation::class, 'employee_number', 'employee_number');
    }

    public function department()
    {
        return $this->hasOneThrough(Department::class, AssignDesignation::class, 'employee_number', 'id', 'employee_number', 'designation_id');
    }
    public function leaves()
    {
        return $this->hasMany(Leaves::class, 'employees_id');
    }
    public function earnings()
    {
        return $this->hasOne(Earnings::class, 'employee_id');
    }
    public function deductions()
    {
        return $this->hasOne(Deductions::class, 'employees_id');
    }
}
