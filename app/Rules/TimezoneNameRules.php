<?php

namespace App\Rules;

use App\Actions\Http\Timezone;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimezoneNameRules implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!Timezone::nameValid($value))
        {
            $fail(Timezone::messageValid());
        }
    }
}
