<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = "job_type";

    protected $fillable = ['name', 'short_desc', 'image'];

    public function jobList()
    {
        return $this->hasMany(JobVacancy::class, 'type_id', 'id');
    }
}
