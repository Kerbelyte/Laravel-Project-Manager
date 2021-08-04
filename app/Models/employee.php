<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'projects_employees');
    }

    public function getProjectNames()
    {
        $names = '';
        foreach ($this->projects()->get() as $project) {
            $names .= $project->project_name . ', ';
        }
        return rtrim($names, ', ');
    }

    public function addProject($id)
    {
        $found = false;
        foreach ($this->projects()->get() as $project) {
            if ($id == $project->id) {
                $found = true;
                break;
            }
        }
        if (!$found) {
            $this->projects()->attach($id);
        }
    }

    public function removeProjects()
    {
        $this->projects()->detach();
    }

    public function removeProject($id)
    {
        $this->projects()->detach($id);
    }
}
