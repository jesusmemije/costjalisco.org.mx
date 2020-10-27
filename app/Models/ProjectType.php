<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{   
    protected $fillable = ['codigo','titulo','descripcion'];
    protected $table = 'projecttype';
    use HasFactory;
}
