<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $guarded = [];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
