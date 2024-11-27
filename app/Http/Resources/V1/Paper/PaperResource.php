<?php

namespace App\Http\Resources\V1\Paper;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaperResource extends JsonResource
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
            'title' => $this->whenNotNull($this->strL('title', true)),
            'desc' => $this->whenNotNull($this->strL('desc', true, 200)),
            'writer_name' => $this->whenNotNull($this->strL('writer_name', limit: 25)),
            'image' => $this->whenLoaded('image', url($this->image?->path)),
            'created_at' => $this->whenNotNull($this->createdAtTime),
        ];
    }
}
