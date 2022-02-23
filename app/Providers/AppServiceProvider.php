<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use DB;
use App\Models\Stock;
use App\Models\Invoice;
use App\Models\Quotation;
use App\Models\CashSale;
use Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        view()->composer(
            'layouts.navbar', 
            function ($view) {
                $view->with('dispatches', DB::table('stocks as s')->join('transactions as t', 's.trans_id', 't.id')->select(DB::RAW('count(s.id) as total'))->where('s.status', 0)->where('t.trans_desc', 'LIKE', '%Dispatch%')->get());
                $view->with('pending_invoices', count(Invoice::where('process_status','0')->orWhereNull('process_status')->get()));
                $view->with('pending_quotations', count(Quotation::where('status','0')->orWhereNull('status')->get()));
                $view->with('cash_sales', count(CashSale::all()));
                $view->with('user', DB::table('users as u')->join('stores as s', 's.id', 'u.branch')->select(DB::RAW('u.name as name'), DB::RAW('s.store_name as store'))->where('u.id', Auth::user()->id )->first());
            }
        );


        // view()->composer(
        //     'layouts.navbar', 
        //     function ($view) {
        //         $view->with('trips', count(Trip::where('status', '!=' , '0')->orWhereNull('status')->get()));
        //         $view->with('trips_for_approval', count(Trip::where('status', '=', '0')->get()));
        //         $view->with('on_going_trips', count(Trip::where('status', '=', '1')->get()));               
        //         $view->with('unassigned_vehicles', count(Vehicle::where('status', '=', '0')->get()));
        //         $view->with('total_vehicles', count(Vehicle::all()));
        //         $view->with('total_assets', count(Asset::all()));
        //     }
        // );

        Paginator::useBootstrap();
    }
}
