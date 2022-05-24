<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\Student;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'groups_number',
        'students_number',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

}
