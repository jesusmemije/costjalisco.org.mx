<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    public function status()
    {
        return $this->hasOne('App\Models\ProjectStatus');
    }
    public function period()
    {
        return $this->hasOne('App\Models\Period');
    }

}
