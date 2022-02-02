<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashTransaction;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $trans_month = date('m');

        $cash_trans = CashTransaction::select(
            DB::RAW('t_no'), 
            DB::RAW("DATE_FORMAT(created_at,'%d') as date"),
            DB::RAW("DATE_FORMAT(created_at,'%m') as month"),
            DB::RAW("DATE_FORMAT(created_at, '%y') as year"),
            DB::RAW("TIME(created_at) as t_date"),
            DB::RAW('t_description'),
            DB::RAW('t_debit'),
            DB::RAW('t_credit'), 
            DB::RAW('t_balance'))
            ->orderBy('date', 'DESC')->orderBy('t_date', 'DESC')
            ->get()
            ->groupBy('date')->map(function($month_info) {
                $date = $month_info->map(function($the_date) { return $the_date['month']; })->first();
                $month = $month_info->map(function($the_month) { return $the_month['date']; })->first();
                $year = $month_info->map(function($the_year) { return $the_year['year']; })->first();
                $sum_balance = $month_info->map(function($the_balance) { return $the_balance['t_balance']; })->sum();
                $sum_debit = $month_info->map(function($the_debit) { return $the_debit['t_debit']; })->sum();
                $sum_credit = $month_info->map(function($the_credit) {return $the_credit['t_credit']; })->sum();
                return [ "transactions" => $month_info, "summary" => ['t_debit'=>$sum_debit, 't_credit' => $sum_credit, 'month' => $month, 'date' => $date, 'year' => $year, 't_balance' => $sum_balance]];
            });

    //return $cash_trans;
    
    //['01']['summary']['t_balance'];
       


    return view ('finance.transaction', ['month' => $cash_trans]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
