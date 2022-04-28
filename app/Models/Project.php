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

    public function countTasks($type, $limit = null)
    {
        $tasks = $this->hasMany(Task::class)->where('type', $type)->orderBy('created_at', 'desc');

        if ($limit) {
            $tasks->limit($limit);
        }

        return $tasks->get();
    }

    public function recentTasksStatus($type, $count = 5)
    {
        $tasks = $this->countTasks($type, $count);
        $statusArr = [];

        for ($i = 0; $i < $count; $i++) {
            $statusArr[] = isset($tasks[$i]) ? $tasks[$i]->status : '⚪';
        }

        return $statusArr;
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
