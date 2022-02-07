<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function projectCategories()
    {
        return $this->belongsToMany(ProjectCategory::class);
    }

    public function photos()
    {
        return $this->hasMany(ProjectPhoto::class);
    }
}
