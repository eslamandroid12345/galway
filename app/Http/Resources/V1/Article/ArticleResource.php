<?php

namespace App\Http\Resources\V1\Article;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'created_at' => $this->whenNotNull($this->createdAtTime),
            'title' => $this->whenNotNull($this->t('title')),
            'desc' => $this->whenNotNull($this->t('desc')),
            'category' => $this->whenLoaded('category', $this->category?->t('title')),
            'created_at_dif' => $this->whenNotNull($this->createdAtDiff),
        ];
    }
}
