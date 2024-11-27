<?php

namespace App\Http\Resources\V1\Calender;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CalenderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->whenNotNull($this->strL('title', true, 25)),
            'url' => $this->whenNotNull($this->url),
            'date' => $this->whenNotNull($this->date),
        ];
    }
}
