<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Group;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',

    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function groups()
    {
        return $this->belongsTo(Group::class);
    }

}
