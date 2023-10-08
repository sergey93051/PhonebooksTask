<?php

namespace App\Services;

use App\Repository\PhoneBooksRepositoryInterface;
use App\Models\PhoneBooks;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Cache;

class PhoneBookService implements PhoneBooksRepositoryInterface
{
   private Model $phoneBooksModel;

   public function __construct(PhoneBooks $phoneBooks)
   {
      $this->phoneBooksModel = $phoneBooks;
   }

   public function getData()
   {
     return Cache::rememberForever('phoneBooksModel',function() {
           return $this->phoneBooksModel->simplePaginate(100);
      });
   }

   public function created(object $requestDetails): Model
   {
    try {
        return $this->phoneBooksModel->create([
            "firstName" => $requestDetails->firstName,
            "lastName" => $requestDetails->lastName,
            "countryCodePhone" => $requestDetails->countryCodePhone,
            "timezoneName" => $requestDetails->timezoneName,
         ]);

    } catch (QueryException $e) {
        throw new HttpResponseException(response()->json([
            'error' => $e->getMessage()
        ],400));
    }
   }

   public function editData(int $phoneBooksId)
   {
    try {

        return $this->phoneBooksModel->find($phoneBooksId);

    } catch (QueryException $e) {
        throw new HttpResponseException(response()->json([
            'error' => $e->getMessage()
        ],400));
    }

   }

   public function updated(object $requestDetails,int $phoneBooksId)
   {
    try {
        return $this->phoneBooksModel->find($phoneBooksId)->update([
            "firstName" => $requestDetails->firstName,
            "lastName" => $requestDetails->lastName,
            "countryCodePhone" => $requestDetails->countryCodePhone,
            "timezoneName" => $requestDetails->timezoneName,
         ]);

    } catch (QueryException $e) {
        throw new HttpResponseException(response()->json([
            'error' => $e->getMessage()
        ],400));
    }

   }

   public function deleted(int $phoneBooksId)
   {
      return $this->phoneBooksModel->destroy($phoneBooksId);
   }
}
