<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_number')->unique(); 
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('addressline');
            $table->string('barangay');
            $table->string('province');
            $table->string('country');
            $table->string('zipcode');
            $table->timestamps();
        });

        Schema::create('assign_designation', function (Blueprint $table) {
            $table->id();
            $table->string('employee_number'); 
            $table->foreign('employee_number')
                ->references('employee_number')
                ->on('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('designation_id');
            $table->string('employee_type');
            $table->enum('status', ['active', 'resigned', 'not_showing_up']);
            $table->timestamps();
        });

        Schema::table('assign_designation', function (Blueprint $table) {
            $table->unique(['employee_number', 'designation_id'], 'unique_employee_designation');
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_name');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });

        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('designation_name');
            $table->foreignId('department_id')
            ->constrained('departments')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_designation');
        Schema::dropIfExists('designations');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('employees');
    }
};