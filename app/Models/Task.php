<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes, UsesUuid;

    protected $fillable = [
        'type',
        'occurrences',
        'result',
    ];

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }
}
