<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Owner;
use App\OwnerMachines;
use App\MachinePurpose;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $active_case = ['is_active' => 1, 'root' => 0, 'is_admin' => 0]; //Active and hides admin and root
        $inactive_case = ['is_active' => 0, 'root' => 0, 'is_admin' => 0]; //Active and hides admin and root
        $all_users = ['root' => 0, 'is_admin' => 0];


        View::share('farmerCount', Owner::count());
        View::share('functionalMachines', OwnerMachines::where('status', 'F')->count());
        View::share('active_users', User::where($active_case)->count());
        View::share('x_users', User::where($inactive_case)->count());
        View::share('all_users', User::where($all_users)->count());
        View::share('machine_purposes', MachinePurpose::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
