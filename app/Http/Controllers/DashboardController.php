<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ProductDetails;
use App\Models\CashSale;
use DB;

class DashboardController extends Controller
{
    //


    public function reports(){


        $previous_total_sales = 0;

        $current_total_sales = 0;
        //total_clients

        $total_clients = count(Client::all());


        $current_month = ('m');


        $get_gross_sales = DB::table('cash_sales')->select(DB::RAW('sum(cash_sales.gross_amount) as total_sales'))->get();

        $gross_sales = $get_gross_sales->first()->total_sales;

        $profit = DB::table('cash_transactions')->select(DB::RAW('sum(cash_transactions.t_balance) as net_profit'))->get();

        $total_profits = $profit->first()->net_profit;


        $today_date = date('Y-m-d');


        

        

        $current_sales = DB::table('cash_sales')->select(DB::RAW('sum(cash_sales.gross_amount) as total_sales'))->whereMonth('created_at', date('m', strtotime('month')))->get();
      
        $current_total_sales = $current_sales->first()->total_sales;  
        
       // return $current_total_sales;


       //sales

        $previous_month_sales = DB::table('cash_sales')->select(DB::RAW('sum(cash_sales.gross_amount) as total_sales'))->whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $previous_total_sales = $previous_month_sales->first()->total_sales;

        $diff_in_sales = $current_total_sales - $previous_total_sales;

        

        $sales_perc_change = round($diff_in_sales * 100/ $current_total_sales, 2);

        //profits

        $profit_today = DB::table('cash_transactions')->select(DB::RAW('sum(cash_transactions.t_balance) as total_sales'))->whereDate('created_at', $today_date)->get();

        $profit_yesterday = DB::table('cash_transactions')->select(DB::RAW('sum(cash_transactions.t_balance) as total_sales'))->whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();

        $todays_profit = $profit_today->first()->total_sales;

        if($profit_yesterday ->first()->total_sales == 0){
          $yesterday_profit =  1;
        }

        else{
          $yesterday_profit =  $profit_yesterday ->first()->total_sales;
        }

        

        $diff_in_profit = $todays_profit - $yesterday_profit;

          $profit_perc_change = round($diff_in_profit * 100/ $yesterday_profit, 2);
        

        //product entities

        $total_products = count(ProductDetails::all());
        //return $profit_perc_change;




        return view('home', compact('sales_perc_change', 'current_total_sales', 'total_clients', 'gross_sales', 'total_profits', 'todays_profit', 'profit_perc_change', 'total_products'));

      //  return $sales_perc_change;








    }


}
