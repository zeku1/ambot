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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
}
