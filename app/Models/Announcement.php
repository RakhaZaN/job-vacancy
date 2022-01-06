<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    // use HasFactory;

    protected $table = "purpose_announcement";

    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(PurposeJob::class, 'purpose_job_id');
    }
}
