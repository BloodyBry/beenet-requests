<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteRequest extends Model
{
    protected $fillable = [
        'full_name',
        'company_name',
        'email',
        'phone',
        'service_id',
        'budget',
        'deadline',
        'project_description',
        'status',
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}