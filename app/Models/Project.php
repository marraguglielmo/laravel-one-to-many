<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function type()
    {
        // il progetto appartiene a un tipo
        return $this->belongsTo(Type::class);
    }


    protected $fillable = [
        'title',
        'type_id',
        'slug',
        'languages'
    ];
}
