<?php

namespace App\Http\Resources\V1\About;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutGeneralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ,
            'title' => $this->whenNotNull($this->strL('title', true), ($this->strL('title', true))),
            'second_title' => $this->whenNotNull($this->strL('second_title', true)),
            'desc' => $this->whenNotNull($this->strL('desc', true, 200), $this->strL('desc', true, 200)),
            'image' => $this->whenNotNull($this->imageUrl, $this->imageUrl),
        ];
    }
}
