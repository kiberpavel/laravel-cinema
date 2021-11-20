<?php

/**
 * Class api controller
 *
 * Description
 *
 * php version 8.0
 *
 * @category Vendor
 * @package  Vendor
 * @author   Pavel Butenko <pavlo.butenko@nixsollutions.com>
 * @license  Licence Name
 * @link     link to class documentation
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\FilmCollection;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class api controller
 *
 * Description
 *
 * @category Vendor
 * @package  Vendor
 * @author   Pavel Butenko <pavlo.butenko@nixsollutions.com>
 * @license  Licence Name
 * @link     link to class documentation
 */
class FilmController extends Controller
{
    /**
     * Short descripton
     *
     * @param Request $request comment about this variable
     *
     * @return FilmResource|JsonResponse
     */
    public function create(Request $request): FilmResource | JsonResponse
    {
        $data = $request->input();
        $rules = [
            "name" => "required|min:2",
            "year_of_issue" => "required|min:4",
            "about" => "required",
            "rating" => "bail|required|numeric|gt:0",
            "trailer_url" => "required",
            "min_age" => "required",
            "producer_id" => "required|exists:producers,id"
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $films = Film::create($data);

        return new FilmResource($films);
    }

    public function get(): FilmCollection | JsonResponse
    {
        $films = Film::paginate(10);
        $items = $films->items();
        $total = $films->total();
        $perPage = $films->perPage();
        $currentPage = $films->currentPage();
        $lastPage = $films->lastPage();

        if ($currentPage > $lastPage) {
            return response()->json(
                ['currentPage' => "данной страцицы не существует"],
                Response::HTTP_NOT_FOUND
            );
        } else {
            return new FilmCollection(
                $items,
                $total,
                $perPage,
                $currentPage,
                $lastPage
            );
        }
    }
}
