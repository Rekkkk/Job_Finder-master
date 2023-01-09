<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    use HasFactory;

    protected $table = 'requirements';

    protected $fillable = [
        'user_id',
        'job_id',
        'pdf_description',
        'pdf'
    ];  
}
