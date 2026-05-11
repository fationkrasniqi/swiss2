<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_postings';

    protected $fillable = [
        'title',
        'description',
        'location',
        'employment_type',
        'requirements',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
