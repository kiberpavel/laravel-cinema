<?php

/**
 * Class producer controller
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

use App\Http\Resources\ProducerResource;
use App\Models\Producer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class producer controller
 *
 * Description
 *
 * @category Vendor
 * @package  Vendor
 * @author   Pavel Butenko <pavlo.butenko@nixsollutions.com>
 * @license  Licence Name
 * @link     link to class documentation
 */
class ProducerController extends Controller
{
    /**
     * Short description
     *
     * @return AnonymousResourceCollection
     */
    public function get(): AnonymousResourceCollection
    {
        return ProducerResource::collection(Producer::all());
    }
}
