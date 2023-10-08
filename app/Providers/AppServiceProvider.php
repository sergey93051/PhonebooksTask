<?php

namespace App\Providers;

use App\Repository\Auth\UsersRepositoryInterface;
use App\Repository\PhoneBooksRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\Auth\UserService;
use App\Services\PhoneBookService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
    */

    public $bindings = [
        UsersRepositoryInterface::class => UserService::class,
        PhoneBooksRepositoryInterface::class => PhoneBookService::class
    ];


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
