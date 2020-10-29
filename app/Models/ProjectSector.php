<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSector extends Model
{   
    protected $fillable = ['codigo','titulo','descripcion'];
    protected $table = 'projectsector';
    use HasFactory;
}
