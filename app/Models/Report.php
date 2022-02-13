<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // use HasFactory;

    protected $guarded = [];

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id');
    }

    public function applicants()
    {
        return $this->hasMany(PurposeJob::class, 'job_vacancy_id', 'job_vacancy_id');
    }
}
