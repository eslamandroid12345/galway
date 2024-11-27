<?php

namespace App\Http\Resources\V1\CenterNews;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CenterNewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->whenNotNull($this->t('title')),
            'desc' => $this->whenNotNull($this->t('desc')),
            'writer_name' => $this->whenNotNull($this->writer_name),
            'image' => $this->whenLoaded('image', url($this->image?->path)),
            'created_at' => $this->whenNotNull($this->createdAtTime),
        ];
    }
}
