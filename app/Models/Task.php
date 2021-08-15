<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'project_id',
    ];

    public function getIsCompleteAttribute()
    {
        return $this->completed_at !== null;
    }

    public function complete()
    {
        $this->completed_at = now();

        $this->save();
    }

    public function reopen()
    {
        $this->completed_at = null;

        $this->save();
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
