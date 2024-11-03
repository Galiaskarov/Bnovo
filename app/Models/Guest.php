<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $country
 *
 * @mixin Eloquent
 */
class Guest extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'country'];
}
