<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Goodie extends Model
{
    protected $connection = 'site_data';
    protected $table = 'goodies';
}
