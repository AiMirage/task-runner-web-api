<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TaskResource extends JsonResource
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
            'type' => 'Count ' . ucfirst($this->type),
            'result' => $this->result,
            'occurrences' => $this->occurrences,
            'project' => $this->whenLoaded('Project'),
            'created_at' => $this->created_at,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
        ];
    }
}
