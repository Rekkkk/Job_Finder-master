<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';

    protected $primaryKey = 'job_id';

    protected $fillable = [
        'job_title',
        'job_type',
        'company_name',
        'company_address',
        'job_description',
        'user_id'

    ];  

    // public function user()
    // {
    //     return $this->hasOne(User::class, 'job_id', 'user_id');
    // }

    public function user()
    {
        return $this->belongsToMany(User::class, 'applicant', 'job_id', 'user_id')->withPivot('is_accepted', 'is_decline', 'is_reported', 'schedule');
    }

    public function reports(){
        return $this->hasMany(JobReport::class);
    }
    
}
