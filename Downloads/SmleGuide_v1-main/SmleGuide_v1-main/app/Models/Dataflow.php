<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dataflow extends Model
{

    use HasFactory;

    protected $table = 'dataflow_cases';

    protected $fillable = [
        'title',
        'name',
        'passport_no',
        'dataflow_email',
        'dataflow_password',
        'service_id',
        'service_name',
        'status',
        'file',

    ];

    public function getStatusBadgeClassAttribute()
{
    $map = [
        'dataflow_pending'      => 'bg-warning-subtle text-warning',
        'application_submitted' => 'bg-primary-subtle text-primary',
        'application_in_progress' => 'bg-primary-subtle text-primary',
        'quality_check' => 'bg-primary-subtle text-primary',
        'report_completed_positive'             => 'bg-success-subtle text-success',
        'rejected'              => 'bg-danger-subtle text-danger',
        // Add more statuses here as needed
    ];

    return $map[trim($this->status)] ?? 'bg-secondary-subtle text-secondary';
}
}
