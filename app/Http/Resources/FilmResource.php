<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'year_of_issue' => $this->year_of_issue,
            'about' => $this->about,
            'rating' => $this->rating,
            'trailer_url' => $this->trailer_url,
            'min_age' => $this->min_age,
            'producer_id' => $this->producer_id,
        ];
    }
}
