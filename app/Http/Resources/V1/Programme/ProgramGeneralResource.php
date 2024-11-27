<?php

namespace App\Http\Resources\V1\Programme;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramGeneralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenNotNull($this->id, $this->id),
            'title' => $this->whenNotNull($this->strL('title', true), $this->strL('title', true)),
            'desc' => $this->whenNotNull($this->strL('desc', true, 200), $this->strL('desc', true, 200)),
            'image' => $this->whenLoaded('image', url($this->image?->path)),
        ];
    }
}
