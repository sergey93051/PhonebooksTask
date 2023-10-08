<?php

namespace App\Actions\Http;

use Illuminate\Support\Facades\Http;

class Phone
{

  public static function numberValid($number): bool
  {
    $response = Http::get('http://phone-number-api.com/json?number='.$number);

    return  $response->object()->numberValid;

  }

  public static function messageValid(): string
  {
     return "invalid country Code or Phone";
  }

}
