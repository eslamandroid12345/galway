<?php

namespace App\Http\Resources\V1\CenterPublication;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CenterPublicationGeneralResource extends JsonResource
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
            'title' => $this->whenNotNull($this->strL('title', true, 25)),
            'desc' => $this->whenNotNull($this->strL('desc', true, 50)),
            'image' => $this->whenNotNull($this->imageUrl),
        ];
    }
}
