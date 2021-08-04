<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'projects_employees');
    }

    public function getEmployeeProjects()
    {
        $projects = '';
        foreach($this->employees()->get() as $employee) {
            $projects .= $employee->employee_name . ', ';
        }
        return rtrim($projects, ', ');
    }

    public function addEmployee($id) 
    {
        $found = false;
        foreach($this->employees()->get() as $employee) {
            if($id == $employee->id) {
                $found = true;
                break;
            }
        }
        if(!$found) {
            $this->employees()->attach($id);
        }
    }

    public function removeEmployees() 
    {
        $this->employees()->detach();
    }

    public function removeEmployee($id) 
    {
        $this->employees()->detach($id);
    }
}
