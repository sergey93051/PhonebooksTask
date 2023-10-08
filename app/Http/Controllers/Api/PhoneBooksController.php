<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePhoneBooksRequest;
use App\Http\Requests\UpdatePhoneBooksRequest;
use App\Http\Resources\DeletePhoneBooksResource;
use App\Http\Resources\PhoneBookResource;
use App\Http\Resources\StorePhoneBooksResource;
use App\Http\Resources\UpdatePhoneBooksResource;
use App\Models\PhoneBooks;
use App\Repository\PhoneBooksRepositoryInterface;

class PhoneBooksController extends Controller
{

    public function __construct(protected PhoneBooksRepositoryInterface  $phoneBooksRepository)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  new PhoneBookResource(
            $this->phoneBooksRepository->getData()
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhoneBooksRequest $request)
    {
        $this->phoneBooksRepository->created((object)$request->all());

        return  new StorePhoneBooksResource([
            'success' => "created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $phoneBooksId)
    {
        return  new PhoneBookResource(
            $this->phoneBooksRepository->editData($phoneBooksId)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhoneBooksRequest $request, int $phoneBooksId)
    {

        $this->phoneBooksRepository->updated((object)$request->all(), $phoneBooksId);

        return  new UpdatePhoneBooksResource([
            'success' => "updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $phoneBooksId)
    {
        $this->phoneBooksRepository->deleted($phoneBooksId);

        return  new DeletePhoneBooksResource([
            'success' => "deleted"
        ]);
    }
}
