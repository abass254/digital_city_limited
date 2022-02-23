<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Stock;
use App\Models\CashTransaction;
use App\Models\Transaction;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Auth;
use DB;
use App\Models\Store;

class PurchaseController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $prc = new Purchase();

        $lastInvoiceID = $prc->orderBy('id', 'desc')->pluck('id')->first();
        $orderCodes = 'PO-' . str_pad($lastInvoiceID + 1, 4, "0", STR_PAD_LEFT);

        $prods = new ProductDetails;

        $products = $prods->orderBy('code')->get();

        $stores = Store::all();

        return view('purchase.create', compact('products', 'stores', 'orderCodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function purchProducts(Request $req){



        $data = $req->all();

        // $others = $data->find(
        // $amount_paid = $data['amount_paid'],
        // $exp_arrival_date = $data['exp_arrival_date'],
        // $net_total = $data['net_total'],
        // $tax = $data['tax'],
        // $sub_total = $data['sub_total'],
        // $code = $data['code'],
        // $quantity = $data['quantity'],
        // $price = $data['price'],
        // $total_amount = $data['total_amount']);


        


        return $data;



       

       


      // return $amount_paid;
       
       



       // return view('receipt.lpo', compact('data'));
    }


    
    public function store(Request $request)
    {
       
        //STORE DATA TO TRANSACTIONS TABLE
        $user = auth()->user()->name;
        $transaction = new Transaction();
        $transaction->trans_desc = "Purchases";
        $transaction->trans_date = Carbon::now()->format("Y-m-d");
        $transaction->trans_by = Auth::user()->name;
        $transaction->save();
        
        $trans_id = $transaction->id;


        //STORE DATA TO PURCHASE TABLE
        $request->validate([
            'p_code' => 'required|unique:purchases',
        ]);
        $purch = new Purchase();
        $purch->p_code = $request->p_code;
        $purch->supplier = $request->supplier;
        $purch->expected_arrival_date = $request->exp_arrival_date;
        $purch->sub_total = $request->net_total;
        $purch->tax = $request->tax;
        $purch->trans_id = $trans_id;
        $purch->total_amount = $request->sub_total;
        $purch->status = '0';
        
        $purch->shipped_to = 'DC Main WareHouse';

        $purch->save();

        $purch_id = $purch->id;

        session(['purch_id' => $purch_id]);



        //STORE DATA TO PURCHASE_DETAILS TABLE
        for ($product_id=0; $product_id < count($request->product_id); $product_id++) {
            
            $purch_d = new PurchaseDetail();
            $purch_d->purchase_id = $purch_id;
            $purch_d->item_id = $request->product_id[$product_id];
            $purch_d->quantity = $request->quantity[$product_id];
            $purch_d->unit_price = $request->price[$product_id];
            $purch_d->total_amount = $request->total_amount[$product_id];


            $purch_d->save();

            # code...
        }



        //STORE DATA TO STOCKS TABLE WHERE status = 0
        for ($product_id=0; $product_id < count($request->product_id); $product_id++) { 
            # code...
            $stock = new Stock();
            $stock->prod_id = $request->product_id[$product_id];
            $stock->qty = $request->quantity[$product_id];
            $stock->store_id = 5;
            $stock->status = 0;
            $stock->trans_id = $trans_id;
            $stock->save();
        
        }


        Alert::success('Purchase successfully made. Please proceed with the payments');



        return redirect()->back();




        
    }
    
    
    
    
    public function getLPO($id){

        $purchase = Purchase::findorFail($id);

        //dd($purchase->id);

        $sales = DB::table('product_details')
           ->join('purchase_details', 'product_details.id', '=', 'purchase_details.item_id')->join('purchases', 'purchases.id', '=', 'purchase_details.purchase_id')->join('transactions', 'purchases.trans_id', '=', 'transactions.id')
           ->select(
               DB::RAW('product_details.id AS id'),
               DB::RAW('purchases.id AS purch_id'),
               DB::RAW('purchases.supplier as supplier'),
               DB::RAW('purchases.expected_arrival_date as expected_arrival_date'),
               DB::RAW('purchases.shipped_to as shipped_to'),
               DB::RAW('product_details.code AS item_code'),
               DB::RAW('product_details.name AS name'),
               DB::RAW('product_details.description AS description'),
               DB::RAW('purchase_details.unit_price AS unit_price'),
               DB::RAW('purchase_details.quantity AS quantity'),
               DB::RAW('purchase_details.total_amount AS total_amount_qty'),
               DB::RAW('purchases.p_code AS po_code'),
               DB::RAW('purchases.status AS status'),
               DB::RAW('purchases.sub_total AS sub_total'),
               DB::RAW('purchases.tax AS tax'),
               DB::RAW('purchases.total_amount AS total_amount'),
               DB::RAW('transactions.trans_date AS trans_date')
            )
           ->where('purchases.id', '=', $purchase->id)
           ->get()
           ->map(function($sales){

            return $sales;
            
            
           });

    //   return $sales;
           
           
       return view('receipt.lpo')->with('sales', $sales);

        
    }

    public function confirmPayment($id){

        $purch_p = Purchase::find($id);
        $purch_p->status = '1';
        $purch_p->save();
        //STORE DATA TO CASH TRANSACTIONS TABLE

        $purch = Purchase::where('id', $id)->first();
        $purch_code = $purch->p_code;
        $cash_gross_amount = $purch->total_amount;


        $cash_trans = new CashTransaction();
        $cash_trans->t_no = "TRS-". $purch_code;
        $cash_trans->t_date = Carbon::now()->format("d/m/Y");
        $cash_trans->t_description = "Purchases";
        $cash_trans->t_debit/**(profit) */ = 0;
        $cash_trans->t_by/**(by) */ = Auth::user()->id;
        $cash_trans->t_credit/**(loss) */ = $cash_gross_amount;
        $cash_trans->t_balance = 0 - $cash_gross_amount ;
        $cash_trans->save();



        Alert::success('Payment successfully made!!!');




        return redirect()->route('view_lpo');




    }

    public function viewLPOs(){

        $purchases = DB::table('purchases')->orderBy('status')->get();

      //  return $purchases; code, product_name, quantity, prod_id

        return view('receipt.index_lpo', compact('purchases'));
    }


    public function importedGoods(){


        $imported_items = DB::table('transactions'
        )->join('stocks', 'transactions.id', 'stocks.trans_id')
        ->join('product_details', 'product_details.id', 'stocks.prod_id')
        ->join('purchases', 'transactions.id', 'purchases.trans_id')
        ->select(
            DB::RAW('stocks.qty as quantity'),
            DB::RAW('stocks.id as stock_id'),
            DB::RAW('product_details.name as product_name'),
            DB::RAW('purchases.p_code as p_code'),
            DB::RAW('product_details.id as p_id'),
            DB::RAW('product_details.code as code'),
            DB::RAW('stocks.status as s_status'),
            DB::RAW('transactions.trans_desc as t_desc'),
            DB::RAW('purchases.status as p_status')
        )
        
        ->where('stocks.status', '0')
        ->where('transactions.trans_desc', 'like', '%Purchases%')
        ->where('purchases.status', '1')
        ->get()->map(function($imported_items){

        //    $p_code = $imported_items->p_code->first();

            return $imported_items ;
        });

     
     
     //   return $imported_items;

       return view('purchase.confirm_purchase')->with('imported_items', $imported_items);
    }

    
}
