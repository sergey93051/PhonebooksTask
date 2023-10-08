<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBooks extends Model
{
    use HasFactory;

    protected $table = 'phone_bookes';

    protected $fillable = [
        "firstName",
        "lastName",
        "countryCodePhone",
        "timezoneName",

];

/**
 * The name of the "created at" column.
 *
 * @var string
 */
const CREATED_AT = 'inserted_on';

/**
 * The name of the "updated at" column.
 *
 * @var string
 */
 const UPDATED_AT = 'updated_on';
}
