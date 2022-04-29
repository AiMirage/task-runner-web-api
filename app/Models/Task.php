<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use App\Services\Count\Counter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Task extends Model
{
    use HasFactory, SoftDeletes, UsesUuid, Counter;

    protected $fillable = [
        'type',
        'occurrences',
        'result',
        'file',
    ];

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getStatusAttribute()
    {
        switch ($this->result) {
            case 'Success' :
                return '🟢';
            case 'Failed':
                return '🔴';
            case null:
                return '⌛';
            default :
                return '↪️';
        }
    }
}
