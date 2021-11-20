<?php

/**
 * Class producer model
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
 * Class producer model
 *
 * Description
 *
 * @category Vendor
 * @package  Vendor
 * @author   Pavel Butenko <pavlo.butenko@nixsollutions.com>
 * @license  Licence Name
 * @link     link to class documentation
 */
class Producer extends Model
{
    use HasFactory;

    /**
     * Property
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'second_name',
    ];

    /**
     * Property
     *
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
