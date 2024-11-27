<?php

namespace App\Http\Resources\V1\Article;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleGeneralResource extends JsonResource
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
            'created_at' => $this->whenNotNull($this->createdAtTime, $this->createdAtTime),
            'title' => $this->whenNotNull($this->strL('title', true), $this->strL('title', true)),
            'category' => $this->whenLoaded('category', $this->category?->strL('title', true)),
            'created_at_dif' => $this->whenNotNull($this->createdAtDiff, $this->createdAtDiff),
        ];
    }
}
