<?php

/**
 * Class film model
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

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class film model
 *
 * Description
 *
 * @category Vendor
 * @package  Vendor
 * @author   Pavel Butenko <pavlo.butenko@nixsollutions.com>
 * @license  Licence Name
 * @link     link to class documentation
 */
class Film extends Model
{
    use HasFactory;

    /**
     * Property
     *
     * @var string
     */
    protected $table = 'films';
    /**
     * Property
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'year_of_issue',
        'about',
        'rating',
        'trailer_url',
        'min_age',
        'producer_id'
    ];
}
