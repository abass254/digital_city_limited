<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\Store;
use DB;
use App\Models\Client;
use App\Models\CashSale;
use App\Models\CashSaleDetail;
use App\Models\Transaction;
use App\Models\Stock;
use App\Models\CashTransaction;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use Carbon\Carbon;
use Auth;


class QuotationController extends Controller
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

        $prods = new ProductDetails;

        $products = $prods->orderBy('code')->get();

        $stores = Store::all();

        $clients  = Client::all();


        return view('quotation.create', compact('products', 'stores', 'clients'));
    }

    public function cashSalepage(){
        $ord = new CashSale();

        $lastInvoiceID = $ord->orderBy('id', 'desc')->pluck('id')->first();
        $orderCodes = 'CS-' . str_pad($lastInvoiceID + 1, 4, "0", STR_PAD_LEFT);

        $prods = new ProductDetails;

        $products = $prods->orderBy('code')->get();

        $stores = Store::all();

        $clients  = Client::all();


        return view('cash_sale.create', compact('products', 'stores', 'clients', 'orderCodes'));


    }

    public function quotPage(){
        $ord = new Quotation();

        $lastInvoiceID = $ord->orderBy('id', 'desc')->pluck('id')->first();
        $orderCodes = 'QUOT-' . str_pad($lastInvoiceID + 1, 4, "0", STR_PAD_LEFT);

        $prods = new ProductDetails;

        $products = $prods->orderBy('code')->get();

        $stores = Store::all();

        $clients  = Client::all();


        return view('quotation.create', compact('products', 'stores', 'clients', 'orderCodes'));


    }


    public function getReceipt(Request $request, $id){

        $cash_sale = CashSale::findorFail($id);

        //dd($cash_sale->id);

        $sales = DB::table('product_details')
           ->join('cash_sale_details', 'product_details.id', '=', 'cash_sale_details.prod_id')->join('cash_sales', 'cash_sales.id', '=', 'cash_sale_details.cash_id')->join('transactions', 'cash_sales.trans_id', '=', 'transactions.id')
           ->select(
               DB::RAW('product_details.id AS id'),
               DB::RAW('product_details.code AS item_code'),
               DB::RAW('product_details.name AS name'),
               DB::RAW('product_details.description AS description'),
               DB::RAW('cash_sale_details.price AS price'),
               DB::RAW('cash_sale_details.qty AS qty'),
               DB::RAW('cash_sale_details.price AS price'),
               DB::RAW('cash_sale_details.tax AS tax'),
               DB::RAW('cash_sale_details.total_amount AS total_amount'),
               DB::RAW('cash_sales.code AS receipt_code'),
               DB::RAW('cash_sales.gross_amount AS gross_amount'),
               DB::RAW('cash_sales.net_tax AS net_tax'),
               DB::RAW('cash_sales.amount_paid AS amount_paid'),
               DB::RAW('cash_sales.returning_change AS returning_change'),
               DB::RAW('transactions.trans_date AS trans_date')
            )
           ->where('cash_sales.id', '=', $cash_sale->id)
           ->get()//->groupBy('receipt_code')
           ->map(function($sales){

            return $sales;
            
            
           });

      //  return $sales;
           
           
       return view('receipt.receipt')->with('sales', $sales);

        
    }


    public function storeCashSales(Request $request){


        //Transaction = "cash_sale"

        DB::transaction(function () use ($request){


            //Transaction Model
    
            //'', '', '', '', ''
            //'', '', '', '', ''
            
            
            ///Storing Data to the transactions table >>>>>>>>>>>
            
            $user = auth()->user()->name;
            $transaction = new Transaction();
            $transaction->trans_desc = "Cash Sale";
            $transaction->trans_date = Carbon::now()->format("Y-m-d");
            $transaction->trans_by = Auth::user()->name;
            $transaction->save();
            
            $trans_id = $transaction->id;



            ///Storing Data to the cash_sales table >>>>>>>>>>>
            $request->validate([
                'code' => 'required|unique:cash_sales',
            ]);

            $cashier = new CashSale();
            $cashier->trans_id = $trans_id;
            $cashier->gross_amount = $request->gross_amount;
            $cashier->net_tax = $request->net_tax;
            $cashier->amount_paid = $request->amount_paid;
            $cashier->code = $request->code;
            $cashier->returning_change = $request->returning_change;

            $cashier->save();

            //$cashier = new CashSale();
            $cash_id = $cashier->id;
            $cash_code = $cashier->code;
            $cash_gross_amount = $cashier->gross_amount;


            session(['cash_id'=>$cash_id]);

           // $this->storeCashSales($cash_id);

           ///Storing products to the cash_details table >>>>>>>>>>>

            
            for ($product_id=0; $product_id < count($request->product_id); $product_id++) { 
                # code...
                $stock = new CashSaleDetail();
                $stock->cash_id = $cash_id;
                $stock->price = $request->price[$product_id];
                $stock->prod_id = $request->product_id[$product_id];
                $stock->qty = ''.$request->quantity[$product_id];
                $stock->tax = $request->tax[$product_id];
                $stock->total_amount = $request->total_amount[$product_id];
                $stock->save();
    
    
            }
            // Stock
    
    
            ///Deleting sold products from the stocks table >>>>>>>>>>>    
            //'', '', '', '', ''
            for ($product_id=0; $product_id < count($request->product_id); $product_id++) { 
                # code...
                $stock = new Stock();
                $stock->prod_id = $request->product_id[$product_id];
                $stock->qty = '-'.$request->quantity[$product_id];
                $stock->store_id = Auth::user()->branch;
                $stock->trans_id = $trans_id;
                $stock->save();
    
    
            }
            
            
           ///Transaction the respective amounts to the transaction table >>>>>>>>>>>


           $cash_trans = new CashTransaction();
           $cash_trans->t_no = "TRS-". $cash_code;
           $cash_trans->t_date = Carbon::now()->format("d/m/Y");
           $cash_trans->t_description = "Cash Sale";
           $cash_trans->t_debit/**(profit) */ = $cash_gross_amount;
           $cash_trans->t_credit/**(loss) */ = 0;
           $cash_trans->t_balance = $cash_gross_amount - 0;
           $cash_trans->save();
    
            
    
            return $cash_id;
    
    
           });
           
           
           return redirect()->route('view_rec', session('cash_id') );

        




    }
    public function viewReceipts(){

        $cash_sales = CashSale::all();

        //print_r($cash_sales);

        return view('receipt.index', compact('cash_sales'));
    }











    public function storeQuotations(Request $request){


        //Transaction = "cash_sale"

        //return $request->all();

        DB::transaction(function () use ($request){


            //Transaction Model
    
            //'', '', '', '', ''
            //'', '', '', '', ''
            
            
            ///Storing Data to the transactions table >>>>>>>>>>>
            
            $user = auth()->user()->name;
            $transaction = new Transaction();
            $transaction->trans_desc = "Quotations";
            $transaction->trans_date = Carbon::now()->format("Y-m-d");
            $transaction->trans_by = Auth::user()->name;
            $transaction->save();
            
            $trans_id = $transaction->id;



            ///Storing Data to the quotations table >>>>>>>>>>>
            $request->validate([
                'code' => 'required|unique:quotations',
            ]);

            $quotations = new Quotation();
            $quotations->trans_id = $trans_id;
            $quotations->status = "0";
            $quotations->total_amount = $request->net_total;
            $quotations->net_tax = $request->tax;
            $quotations->sub_total = $request->sub_total;
            $quotations->code = $request->code;
            $quotations->client_id = $request->client_id;

            $quotations->save();

            $quot_id = $quotations->id;


            session(['quot_id'=>$quot_id]);

            
            for ($product_id=0; $product_id < count($request->product_id); $product_id++) { 
                # code...
                $stock = new QuotationDetail();
                $stock->quot_id = $quot_id;
                $stock->price = $request->price[$product_id];
                $stock->prod_id = $request->product_id[$product_id];
                $stock->quantity = ''.$request->quantity[$product_id];
                $stock->status = '0';
                $stock->total_amount = $request->total_amount[$product_id];
                $stock->save();
            }
            // Stock
    
    
            ///Deleting sold products from the stocks table >>>>>>>>>>>    
            //'', '', '', '', ''
            for ($product_id=0; $product_id < count($request->product_id); $product_id++) { 
                # code...
                $stock = new Stock();
                $stock->prod_id = $request->product_id[$product_id];
                $stock->qty = '-'.$request->quantity[$product_id];
                $stock->store_id = Auth::user()->branch;
                $stock->status = "0";
                $stock->trans_id = $trans_id;
                $stock->save();
    
    
            }
            
    
    
        });

        
           
           
        return redirect()->route('get_quot', session('quot_id'));

    }

    public function viewQuotedItems($id){
        
        $quotation = Quotation::findorFail($id);

        //dd($cash_sale->id);

        $items = DB::table('product_details')
           ->join('quotation_details', 'product_details.id', '=', 'quotation_details.prod_id')->join('quotations', 'quotations.id', '=', 'quotation_details.quot_id')->join('transactions', 'quotations.trans_id', '=', 'transactions.id')
           ->select(
               DB::RAW('product_details.id AS id'),
               DB::RAW('product_details.code AS item_code'),
               DB::RAW('product_details.name AS name'),
               DB::RAW('product_details.description AS description'),
               DB::RAW('quotation_details.id AS qd_id'),
               DB::RAW('quotation_details.price AS price'),
               DB::RAW('quotation_details.status AS qd_status'),
               DB::RAW('quotation_details.quantity AS qty'),
               DB::RAW('quotation_details.price AS price'),
               DB::RAW('quotation_details.total_amount AS total'),
               DB::RAW('quotations.id AS q_id'),
               DB::RAW('quotations.code AS receipt_code'),
               DB::RAW('quotations.status AS status'),
               DB::RAW('quotations.total_amount AS total_amount'),
               DB::RAW('quotations.net_tax AS net_tax'),
               DB::RAW('quotations.sub_total AS sub_total'),
               DB::RAW('quotations.client_id AS client_id'),
               DB::RAW('transactions.trans_date AS trans_date')
            )
           

           
           ->where('quotations.id', '=', $quotation->id)
           ->get();

        return view('quotation.approve_items', compact('items'));
    }


    public function getQuotation($id){

        $quotation = Quotation::findorFail($id);

        $sales = DB::table('product_details')
           ->join('quotation_details', 'product_details.id', '=', 'quotation_details.prod_id')->join('quotations', 'quotations.id', '=', 'quotation_details.quot_id')->join('transactions', 'quotations.trans_id', '=', 'transactions.id')
           ->select(
               DB::RAW('product_details.id AS id'),
               DB::RAW('product_details.code AS item_code'),
               DB::RAW('product_details.name AS name'),
               DB::RAW('product_details.description AS description'),
               DB::RAW('quotation_details.price AS price'),
               DB::RAW('quotation_details.quantity AS qty'),
               DB::RAW('quotation_details.price AS price'),
               DB::RAW('quotation_details.total_amount AS total'),
               DB::RAW('quotations.code AS receipt_code'),
               DB::RAW('quotations.status AS status'),
               DB::RAW('quotations.total_amount AS total_amount'),
               DB::RAW('quotations.net_tax AS net_tax'),
               DB::RAW('quotations.sub_total AS sub_total'),
               DB::RAW('quotations.client_id AS client_id'),
               DB::RAW('transactions.trans_date AS trans_date')
            )
           ->where('quotations.id', '=', $quotation->id)
           ->get()//->groupBy('receipt_code')
           ->map(function($sales){

            return $sales;
            
            
           });

      //  return $sales;
           
           
       return view('receipt.quotation')->with('sales', $sales);

    }

    public function getApprovedQuotation($id){

        $quotation = Quotation::findorFail($id);

        $sales = DB::table('product_details')
           ->join('quotation_details', 'product_details.id', '=', 'quotation_details.prod_id')->join('quotations', 'quotations.id', '=', 'quotation_details.quot_id')->join('transactions', 'quotations.trans_id', '=', 'transactions.id')
           ->select(
               DB::RAW('product_details.id AS id'),
               DB::RAW('product_details.code AS item_code'),
               DB::RAW('product_details.name AS name'),
               DB::RAW('product_details.description AS description'),
               DB::RAW('quotation_details.price AS price'),
               DB::RAW('quotation_details.quantity AS qty'),
               DB::RAW('quotation_details.price AS price'),
               DB::RAW('quotation_details.total_amount AS total'),
               DB::RAW('quotations.code AS receipt_code'),
               DB::RAW('quotation_details.status AS q_status'),
               DB::RAW('quotations.status AS status'),
               DB::RAW('quotations.total_amount AS total_amount'),
               DB::RAW('quotations.net_tax AS net_tax'),
               DB::RAW('quotations.sub_total AS sub_total'),
               DB::RAW('quotations.client_id AS client_id'),
               DB::RAW('transactions.trans_date AS trans_date'),
                )
                    ->where('quotations.id', '=', $quotation->id)->where('quotation_details.status', 1)
                    ->get()->groupBy('q_status')->map(function($quot_info) {  
                        $sum_total = $quot_info->sum('total');
                        $sum_tax = 0.16 * ($sum_total); //$quot_info->sum('net_tax');
                        $f_total = $sum_total + $sum_tax;
                        $receipt_code = $quot_info->first()->receipt_code;
                        $trans_date = $quot_info->first()->trans_date;       
                       // $sum_total = $quot_info->map(function($the_total) { return $the_total['total']; })->sum();
                        return [ "transactions" => $quot_info , "summary" => ['the_total' => $sum_total, 'the_tax' => $sum_tax, 'f_total' => $f_total, 'receipt_code' => $receipt_code, 'date' => $trans_date]];
           });
           
           
           //return $sales; //['1']['transactions'];
        //    return $sales;         
           

        
           
           
       return view('receipt.approved_quotation',['q_status' => $sales ] );

    }


    public function pendingQuotations(){

        $pending_quots = Quotation::where('status', '1')->get();
        $approved_quots = Quotation::where('status', '0')->get();
        return view('quotation.pending_quots', compact('pending_quots', 'approved_quots'));
    }

    public function approveItem($id){

        $pending_item = QuotationDetail::findOrFail($id);
        $pending_item->status = 1;
        $pending_item->save();
        return redirect()->back();

    }

    public function cancelItem($id){

        $pending_item = QuotationDetail::findOrFail($id);
        $pending_item->status = 0;
        $pending_item->save();
        return redirect()->back();

    }


    public function approveQuotation($id){

        $app_quots = Quotation::findOrFail($id);

        //return $app_quots->q_id;
        $app_quots->status = 1;
        $app_quots->save();

        alert()->success('Quotation Successfully Approved');

        return redirect()->route('view_quots');
    }



    
}
