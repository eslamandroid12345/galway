<?php

namespace App\Http\Resources\V1\Topic;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicGeneralResource extends JsonResource
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
            'image' => $this->whenLoaded('image', url($this->image?->path)),
            'title' => $this->whenNotNull($this->strL('title', true), $this->strL('title', true)),
        ];
    }
}
