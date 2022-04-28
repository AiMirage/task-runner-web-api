<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tasks' => [
                'words' => $this->recentTasksStatus('words'),
                'lines' => $this->recentTasksStatus('lines'),
                'chars' => $this->recentTasksStatus('chars'),
            ],
            'created_at' => $this->created_at
        ];
    }
}
