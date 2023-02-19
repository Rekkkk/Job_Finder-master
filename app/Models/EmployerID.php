<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerID extends Model
{
    use HasFactory;

    protected $table = 'employer_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'file_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
