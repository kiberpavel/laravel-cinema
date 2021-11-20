<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FilmCollection extends ResourceCollection
{
    private $data;
    private $totalCount;
    private $perPage;
    private $currentPage;
    private $lastPage;

    public function __construct(
        $data,
        $totalCount,
        $perPage,
        $currentPage,
        $lastPage
    ) {
        parent::__construct($data);
        $this->data = $data;
        $this->totalCount = $totalCount;
        $this->perPage = $perPage;
        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->data,
            'meta' => [
                'pagination' => [
                    'totalCount' => $this->totalCount,
                    'perPage' => $this->perPage,
                    'currentPage' => $this->currentPage,
                    'lastPage' => $this->lastPage,
                ]
            ]
        ];
    }
}
