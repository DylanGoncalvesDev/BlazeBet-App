<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class competition extends Model
{
    protected $fillable = ['name', 'description', 'status', 'start_date', 'end_date'];
}
