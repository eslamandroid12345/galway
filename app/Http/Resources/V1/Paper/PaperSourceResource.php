<?php

namespace App\Http\Resources\V1\Paper;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaperSourceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenNotNull($this->id),
            'title' => $this->whenNotNull($this->t('title')),
            'desc' => $this->whenNotNull($this->t('desc')),
            'writer_name' => $this->whenNotNull($this->t('writer_name')),
            'image' => $this->whenLoaded('image', url($this->image?->path)),
            'created_at' => $this->whenNotNull($this->createdAtTime),
        ];
    }
}
