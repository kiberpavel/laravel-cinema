<?php

/**
 * Class trim string middleware
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

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

/**
 * Class trim string middleware
 *
 * Description
 *
 * @category Vendor
 * @package  Vendor
 * @author   Pavel Butenko <pavlo.butenko@nixsollutions.com>
 * @license  Licence Name
 * @link     link to class documentation
 */
class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
