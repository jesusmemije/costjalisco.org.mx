<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{   
    protected $fillable = ['startDate','endDate','maxExtentDate','durationInDays'];
    protected $table="period";
    use HasFactory;
}
