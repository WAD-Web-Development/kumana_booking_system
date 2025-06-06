<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloseDate extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'title', 'description'];
}
