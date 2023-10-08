<?php

namespace App\Rules;

use App\Actions\Http\Phone;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Exceptions\HttpResponseException;

class PhoneRules implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Phone::numberValid($value)) {
            $fail(Phone::messageValid());
        }
    }
}
