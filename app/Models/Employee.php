<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
