<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManager extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'name',
        'fname',
        'mname',
        'lname',
        'email',
        'password',
    ];
}
