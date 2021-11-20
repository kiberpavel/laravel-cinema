<?php

/**
 * Class film genre model
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
 * Class film genre model
 *
 * Description
 *
 * @category Vendor
 * @package  Vendor
 * @author   Pavel Butenko <pavlo.butenko@nixsollutions.com>
 * @license  Licence Name
 * @link     link to class documentation
 */
class FilmGenre extends Model
{
    use HasFactory;

    /**
     * Property
     *
     * @var string
     */
    protected $table = 'film_genre';
    /**
     * Property
     *
     * @var string[]
     */
    protected $fillable = ['film_id', 'genre_id'];
}
