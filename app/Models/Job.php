<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_postings';

    protected $fillable = [
        'title',
        'title_en',
        'title_de',
        'title_sq',
        'title_fr',
        'description',
        'description_en',
        'description_de',
        'description_sq',
        'description_fr',
        'location',
        'canton_id',
        'employment_type',
        'requirements',
        'requirements_en',
        'requirements_de',
        'requirements_sq',
        'requirements_fr',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function getLocalizedTitle(): string
    {
        $locale = app()->getLocale();
        
        return match($locale) {
            'en' => $this->title_en ?? $this->title ?? '',
            'de' => $this->title_de ?? $this->title ?? '',
            'sq' => $this->title_sq ?? $this->title ?? '',
            'fr' => $this->title_fr ?? $this->title ?? '',
            default => $this->title ?? ''
        };
    }

    public function getLocalizedDescription(): string
    {
        $locale = app()->getLocale();
        
        return match($locale) {
            'en' => $this->description_en ?? $this->description ?? '',
            'de' => $this->description_de ?? $this->description ?? '',
            'sq' => $this->description_sq ?? $this->description ?? '',
            'fr' => $this->description_fr ?? $this->description ?? '',
            default => $this->description ?? ''
        };
    }

    public function getLocalizedRequirements(): ?string
    {
        $locale = app()->getLocale();
        
        return match($locale) {
            'en' => $this->requirements_en ?? $this->requirements,
            'de' => $this->requirements_de ?? $this->requirements,
            'sq' => $this->requirements_sq ?? $this->requirements,
            'fr' => $this->requirements_fr ?? $this->requirements,
            default => $this->requirements
        };
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function canton()
    {
        return $this->belongsTo(Canton::class);
    }
}
