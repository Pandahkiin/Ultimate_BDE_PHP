<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $connection = 'users_data';
    protected $table = 'campuses';
}
