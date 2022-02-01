<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetails;
use Carbon\Carbon;
use Auth;
use App\Models\User;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\Store;

use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function getPendingDispatches(){

        $dispatches = DB::table('product_details')
            ->join('stocks', 'product_details.id', '=', 'stocks.prod_id')->join('stores', 'stores.id', '=', 'stocks.store_id')
            ->select(DB::RAW('product_details.code AS code'),
                    DB::RAW('stocks.prod_id AS prod_id'),
                    DB::RAW('stocks.id AS stock_id'),
                    DB::RAW('product_details.name AS product_name'),
                    DB::RAW('stores.store_name AS store_name'),
                    DB::RAW('stocks.qty AS quantity'),
                    DB::RAW('stocks.*'))->where('stocks.status', '=', '0')->get();


       return view('dispatch.pending_dispatches', compact('dispatches'));


    }

    public function dispatchView()
    {

        $prods = new ProductDetails;

        $products = $prods->orderBy('code')->get();

        $stores = Store::all();

        return view('product.dispatch', compact('products', 'stores'));
    }


    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //



        if (Auth::check())
        {
            // The user is logged in...

            $user = Auth::user()->name;
        }

        


     //   $id = User::findOrFail($id);



        //$id = Auth::user()->id;

    //    $currentUser = find($id);

        DB::transaction(function () use ($request){


        //Transaction Model

        //'', '', '', '', ''
        //'', '', '', '', ''

        $user = auth()->user()->name;
        $transaction = new Transaction();
        $transaction->trans_desc = "Stock Items";
        $transaction->trans_date = Carbon::now()->format("Y-m-d");
        $transaction->trans_by = Auth::user()->name;
        $transaction->save();
        
        $trans_id = $transaction->id;
        // Stock



        //'', '', '', '', ''
        for ($prod_id=0; $prod_id < count($request->prod_id); $prod_id++) { 
            # code...
            $stock = new Stock();
            $stock->prod_id = $request->prod_id[$prod_id];
            $stock->qty = '+'.$request->qty[$prod_id];
            $stock->store_id = Auth::user()->branch;
            $stock->trans_id = $trans_id;
            $stock->save();


        }

        


       });
       
       alert()->success('Done','Product Successfully Added');

       return redirect()->back();
      
    }




    public function confirmDispatch(){

        $user = Auth::user()->branch;

       

        $products = DB::table('product_details')
            ->join('stocks', 'product_details.id', '=', 'stocks.prod_id')
            ->select(DB::RAW('product_details.code AS code'),DB::RAW('stocks.prod_id AS prod_id'),DB::RAW('stocks.id AS stock_id'),DB::RAW('product_details.name AS product_name'), DB::RAW('stocks.qty AS quantity'), DB::RAW('stocks.*'))->where('stocks.store_id', '=',  $user)->where('stocks.status', '=', '0')->get();
        

        return view('product.confirm_dispatch', compact('products'));

    }


    public function acceptDispatch($id)
    {

        $stock = Stock::findOrFail($id);
        $stock->status = 1;
        $stock->save();

        alert()->success('Done','Dispatch Successfully Confirmed');

        return redirect()->back();


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

    public function storeDispatch(Request $request)
    {
        DB::transaction(function () use ($request){


        //Transaction Model

        //'', '', '', '', ''
        //'', '', '', '', ''

        
        $transaction = new Transaction();
        $transaction->trans_desc = "Dispatch";
        $transaction->trans_date = Carbon::now()->format("Y-m-d");
        $transaction->trans_by = Auth::user()->name;
        $transaction->save();
        
        $trans_id = $transaction->id;
        // Stock



        //'', '', '', '', ''
        for ($prod_id=0; $prod_id < count($request->prod_id); $prod_id++) { 
            # code...
            $stock = new Stock();
            $stock->prod_id = $request->prod_id[$prod_id];
            $stock->qty = $request->qty[$prod_id];
            $stock->store_id = $request->to;
            $stock->status = '0';
            $stock->trans_id = $trans_id;
            $stock->save();
            $stock = new Stock();
            $stock->prod_id = $request->prod_id[$prod_id];
            $stock->qty = '-'.$request->qty[$prod_id];
            $stock->store_id = $request->from;
            $stock->trans_id = $trans_id;
            $stock->save();




        }

        


       });
       
       
       alert()->success('Done','Product Successfully Added');
        
       return redirect()->back();


    }


    public function getQtyPerStore($id){

        $qtys = DB::table('stocks')
        ->join('stores', 'stores.id', '=', 'stocks.store_id')
        ->join('product_details', 'stocks.prod_id', '=', 'product_details.id')
        ->select(
            DB::RAW('sum(qty) as total'), 
            DB::RAW('store_id'), 
            DB::RAW('store_name') ,
            DB::RAW('product_details.code'),
            DB::RAW('product_details.image'),
            DB::RAW('product_details.description'),
            DB::RAW('product_details.code'),
            DB::RAW('prod_id'))
            ->where('prod_id', '=', $id)
            ->where('stocks.status', '=', '1')
            ->groupBy('store_id')->get()->map(function($qtys){
               
                
               return $qtys;
              });

       // return $qty;//view('product.list_of_products', compact('qty'));


     //  dd($qtys);


       return view('product.stock_per_product', compact('qtys'));



    }



    public function viewQtyPerStore($id){


       


    }
}
