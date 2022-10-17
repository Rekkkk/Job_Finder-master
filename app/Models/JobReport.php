<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobReport extends Model
{
    use HasFactory;

    protected $table = 'job_reports';
    
    protected $fillable = [
        'job_id',
        'comment',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
