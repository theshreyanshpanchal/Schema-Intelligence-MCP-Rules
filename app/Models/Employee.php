<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'user_id',
    'employee_code',
    'first_name',
    'last_name',
    'middle_name',
    'email',
    'phone',
    'date_of_birth',
    'gender',
    'hire_date',
    'termination_date',
    'employment_type_id',
    'department_id',
    'job_title_id',
    'manager_id',
    'status',
    'address_line_1',
    'address_line_2',
    'city',
    'state',
    'postal_code',
    'country',
])]
class Employee extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'hire_date' => 'date',
            'termination_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employmentType(): BelongsTo
    {
        return $this->belongsTo(EmploymentType::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(self::class, 'manager_id');
    }

    public function subordinates(): HasMany
    {
        return $this->hasMany(self::class, 'manager_id');
    }

    public function headedDepartment(): HasOne
    {
        return $this->hasOne(Department::class, 'head_employee_id');
    }

    public function emergencyContacts(): HasMany
    {
        return $this->hasMany(EmployeeEmergencyContact::class);
    }

    public function leaveBalances(): HasMany
    {
        return $this->hasMany(LeaveBalance::class);
    }

    public function leaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class);
    }

    public function reviewedLeaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class, 'reviewed_by');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function salaries(): HasMany
    {
        return $this->hasMany(Salary::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(EmployeeDocument::class);
    }
}
