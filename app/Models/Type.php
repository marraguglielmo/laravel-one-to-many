<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function projects()
    {
        // un tipo appartiene a più progetti
        return $this->hasMany(Project::class);
    }

    protected $fillable = [
        'title',
        'slug'
    ];
}
