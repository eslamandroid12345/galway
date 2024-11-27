<?php

namespace App\Http\Resources\V1\About;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
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
            'title' => $this->whenNotNull($this->strL('title', true, 50)),
            'second_title' => $this->whenNotNull($this->strL('second_title', true, 50)),
            'desc' => $this->whenNotNull($this->strL('desc', true, 250)),
            'image' => $this->whenNotNull($this->imageUrl),
            'has_members' => $this->whenNotNull($this->has_members),
            'structure_tree' => $this->whenNotNull($this->structure_tree),
        ];
    }
}
