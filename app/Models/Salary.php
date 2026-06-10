<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'employee_id',
    'basic_salary',
    'currency',
    'pay_frequency',
    'effective_from',
    'effective_to',
    'is_current',
])]
class Salary extends Model
{
    protected function casts(): array
    {
        return [
            'basic_salary' => 'decimal:2',
            'effective_from' => 'date',
            'effective_to' => 'date',
            'is_current' => 'boolean',
        ];
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
