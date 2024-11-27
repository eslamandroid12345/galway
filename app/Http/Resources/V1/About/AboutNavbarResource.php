<?php

namespace App\Http\Resources\V1\About;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutNavbarResource extends JsonResource
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
            'has_members' => $this->whenNotNull($this->has_members),
            'structure_tree' => $this->whenNotNull($this->structure_tree),
        ];
    }
}
