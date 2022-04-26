<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes, UsesUuid;

    protected $fillable = [
        'id',
        'user_id',
    ];

    protected $hidden = [];

    public function Tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
