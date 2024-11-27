<?php

namespace App\Http\Resources\V1\About;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutMoreGeneralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->whenNotNull($this->strL('title', true), ($this->strL('title', true))),
            'desc' => $this->whenNotNull($this->strL('desc', true, 200), $this->strL('desc', true, 200)),
        ];
    }
}
