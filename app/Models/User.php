<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $collection = 'users';
    protected $primaryKey = 'user_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'user_type',
        'user_name',
        'user_document',
        'user_email',
        'user_wallet'
    ];

    protected $hidden = [
        'password',
    ];
}
