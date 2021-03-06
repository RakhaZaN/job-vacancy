<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurposeJob extends Model
{
    // use HasFactory;

    protected $table = "purpose_job";

    protected $guarded = [];

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id');
    }

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_detail_id');
    }
}
