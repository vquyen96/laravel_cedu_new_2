<?php

namespace App\Providers;
use Auth;
use Illuminate\Support\ServiceProvider;
use App\Models\Group;
use App\Models\About;
use App\Models\Account_Request;
use App\Models\Noti;
use DateTime;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['groups'] = Group::where('gr_parent_id', 0)->get();
        $data['about_list'] = About::all();
        $data['noti'] = Noti::paginate(6);
        
        
        view()->share($data);
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
