<?php

namespace App\Repository;

    /**
     *
     * @param object $usersDetails
     *
    */

interface PhoneBooksRepositoryInterface
{
    public function getData();
    public function created(object $usersDetails);
    public function editData(int $phoneBooksId);
    public function updated(object $requestDetails,int $phoneBooksId);
    public function deleted(int $phoneBooksId);

}
