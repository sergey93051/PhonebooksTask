<?php

namespace App\Actions\Http;

use Illuminate\Support\Facades\Http;

class Timezone
{

  public static function nameValid($name): bool
  {
    $response = Http::get('http://worldtimeapi.org/api/timezone');

    return  $response->collect()->contains(function (string $value, int $key) use($name) {
        return $value===$name;
    });

  }

  public static function messageValid(): string
  {
     return "invalid Timezone name";
  }

}
