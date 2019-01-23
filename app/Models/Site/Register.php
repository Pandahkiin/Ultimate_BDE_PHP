<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'registers';
    public $timestamps = false;

    protected $fillable = [
        'id_Users', 'id_Events'
    ];
}
