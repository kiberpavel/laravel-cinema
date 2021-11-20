<?php

/**
 * Class user model
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

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;

/**
 * Class user model
 *
 * Description
 *
 * @category Vendor
 * @package  Vendor
 * @author   Pavel Butenko <pavlo.butenko@nixsollutions.com>
 * @license  Licence Name
 * @link     link to class documentation
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
