<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ProductDetails;
use App\Models\CashSale;
use Auth;
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


        $get_gross_sales = DB::table('cash_sale_details as cd')->select(DB::RAW('sum(cd.total_amount) as total_sales'))->get();

        $gross_sales = $get_gross_sales->first()->total_sales;

        //return number_format($gross_sales);

        $profit = DB::table('cash_transactions')->select(DB::RAW('sum(cash_transactions.t_balance) as net_profit'))->get();

        $total_profits = $profit->first()->net_profit;

        //return $total_profits;

        // $profit_per_store = DB::table('cash_transactions as ct')->select(DB::RAW('sum(ct.t_balance) as net_profit'))->groupBy('ct.t_by')->where('ct.t_by', Auth::user()->id)->first();

        // $total_profit_per_store = $profit_per_store->net_profit;


        $today_date = date('Y-m-d');


        

        

        $current_sales = DB::table('cash_sales')->select(DB::RAW('sum(cash_sales.gross_amount) as total_sales'))->whereMonth('created_at', date('m', strtotime('month')))->get();



        //return $current_sales;
      
        $current_total_sales = $current_sales->first()->total_sales;  
        
       // return $current_total_sales;


       //sales

        $previous_month_sales = DB::table('cash_sales')->select(DB::RAW('sum(cash_sales.gross_amount) as total_sales'))->whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $previous_total_sales = $previous_month_sales->first()->total_sales;

        $diff_in_sales = $current_total_sales - $previous_total_sales;

        

        $sales_perc_change = round($diff_in_sales * 100/ $current_total_sales, 2);

        //profits

        $l_profit = DB::table('cash_transactions')->select(DB::RAW('sum(cash_transactions.t_balance) as total_sales'), DB::RAW('DATE(created_at) as date'))->groupBy('date')->orderBy('created_at', 'DESC')->get();

       // return $l_profit;

        $collection = $l_profit->values();

        //return 
        $latest_profit = $collection->get(1)->total_sales;

        //return $latest_profit;

        //return $latest_profit->second()->total_sales;

        $profit_today = DB::table('cash_transactions')->select(DB::RAW('sum(cash_transactions.t_balance) as total_sales'))->whereDate('created_at', $today_date)->get();

        $profit_yesterday = DB::table('cash_transactions')->select(DB::RAW('sum(cash_transactions.t_balance) as total_sales'))->whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();

        $todays_profit = $profit_today->first()->total_sales;

        if($profit_yesterday ->first()->total_sales == 0){
          $yesterday_profit =  $latest_profit;
        }

        else{
          $yesterday_profit =  $profit_yesterday ->first()->total_sales;
        }


        //return $yesterday_profit;

        

        $diff_in_profit = $todays_profit - $yesterday_profit;

        $dif_perc = $diff_in_profit / $yesterday_profit;

        $profit_perc_change = round($diff_in_profit * 100/ $yesterday_profit, 2);
        

        //product entities

        $total_products = count(ProductDetails::all());

        $top_selling_items_all = DB::table('product_details as pd')->join('cash_sale_details as cd', 'pd.id' , 'cd.prod_id')
        ->select(DB::RAW('sum(cd.total_amount) as total'), DB::RAW('pd.name as name'), DB::RAW('pd.code as code'))->groupBy('cd.prod_id')->orderBy('total', 'DESC')->get();

        $sales_per_store = $sales_per_store = DB::table('cash_sales as cs')->join('transactions as t', 'cs.trans_id', 't.id')->join('users as u', 't.trans_by', 'LIKE', 'u.name')->join('stores as s', 'u.branch', 's.id')
        ->select(DB::RAW('sum(cs.gross_amount) as total'), DB::RAW('s.store_name'))->groupBy('s.store_name')->where('s.id', Auth::user()->branch)->first();

        $top_selling_items = DB::table('product_details as pd')
        ->join('cash_sale_details as cd', 'pd.id', 'cd.prod_id')
        ->join('cash_sales as cs', 'cd.cash_id', 'cs.id')
        ->join('transactions as t', 't.id', 'cs.trans_id')
        ->join('users as u', 'u.name', 'LIKE', 't.trans_by')
        ->join('stores as s', 'u.branch', 's.id')
        ->select(DB::RAW('pd.code as code'), DB::RAW('pd.name as name'), DB::RAW('sum(cd.total_amount) as total'))
        ->where('t.trans_desc', 'LIKE', '%Cash Sale%')->where('s.id', Auth::user()->branch)
        ->groupBy('pd.code')
        ->orderBy('total', 'DESC')
        ->get();


  


        return view('home', compact('sales_per_store', 'sales_perc_change', 'current_total_sales', 'total_clients', 'gross_sales', 'total_profits', 'todays_profit', 'profit_perc_change', 'total_products', 'top_selling_items','top_selling_items_all'));

      //  return $sales_perc_change;








    }


}
