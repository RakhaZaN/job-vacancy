<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JobVacancy extends Model
{
    protected $table = "job_vacancy";

    protected $guarded = [];

    // protected $with = ['type'];

    public function type()
    {
        return $this->belongsTo(JobType::class, 'type_id');
    }

}
