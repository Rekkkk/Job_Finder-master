<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;

    protected $table = 'users_status';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'is_disable',
        'is_suspend',
        'suspend_end'
    ];

    public function account(){
        return $this->belongTo(User::class, 'user_id');
    }
}
