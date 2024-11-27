<?php

namespace App\Http\Resources\V1\MapCenter;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MapCenterResource extends JsonResource
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
            'title' => $this->whenNotNull($this->t('title'), $this->t('title')),
            'latitude' => $this->whenNotNull($this->latitude, $this->latitude),
            'longitude' => $this->whenNotNull($this->longitude, $this->longitude),
        ];
    }
}
