<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\ProductDetails;
use App\Models\Store;
use App\Models\Client;
use DB;
use App\Models\InvoicePayment;
use App\Models\Transaction;
use App\Models\Stock;
use App\Models\CashTransaction;
use App\Models\InvoiceDetail;
use Carbon\Carbon;
use Auth;

class InvoiceController extends Controller
{
    //


    public function index(){

        $pending_quots = Invoice::where('process_status', '1')->get();
        $approved_quots = Invoice::where('process_status', '0')->get();
        return view('invoice.index', compact('pending_quots', 'approved_quots'));

    }


    public function create(){

        $ord = new Invoice();

        $lastInvoiceID = $ord->orderBy('id', 'desc')->pluck('id')->first();
        $orderCodes = 'INV-' . str_pad($lastInvoiceID + 1, 4, "0", STR_PAD_LEFT);

        $prods = new ProductDetails;

        $products = $prods->orderBy('code')->get();

        $stores = Store::all();

        $clients  = Client::all();


        return view('invoice.create', compact('products', 'stores', 'clients', 'orderCodes'));
    }

    public function store(Request $request){

       // return $request->all();

        DB::transaction(function () use ($request){


            //Transaction Model
    
            //'', '', '', '', ''
            //'', '', '', '', ''
            
            
            ///Storing Data to the transactions table >>>>>>>>>>>
            
            $user = auth()->user()->name;
            $transaction = new Transaction();
            $transaction->trans_desc = "Invoices";
            $transaction->trans_date = Carbon::now()->format("Y-m-d");
            $transaction->trans_by = Auth::user()->name;
            $transaction->save();
            
            $trans_id = $transaction->id;



            ///Storing Data to the quotations table >>>>>>>>>>>
            $request->validate([
                'code' => 'required|unique:invoices',
            ]);

            $invoices = new Invoice();
            $invoices->trans_id = $trans_id;
            $invoices->process_status = "0";  //pending_invoice_waiting_for_approval
            $invoices->payment_status = "0";  //pending_invoice_waiting_for_payment
            $invoices->total_amount = $request->net_total;
            $invoices->net_tax = $request->tax;
            $invoices->amount_paid = "0";
            $invoices->sub_total = $request->sub_total;
            $invoices->code = $request->code;
            $invoices->client_id = $request->client_id;

            $invoices->save();

            $inv_id = $invoices->id;


            session(['inv_id'=>$inv_id]);

            
            for ($product_id=0; $product_id < count($request->product_id); $product_id++) { 
                # code...
                $stock = new InvoiceDetail();
                $stock->inv_id = $inv_id;
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

        
           
        alert()->success('Invoice Successfully Made, Please wait for approval from the Stocks Department');

        return redirect()->back();


    }

    public function getInvoice($id){

        $invoice = Invoice::findorFail($id);

        $sales = DB::table('product_details')
           ->join('invoice_details', 'product_details.id', '=', 'invoice_details.prod_id')->join('invoices', 'invoices.id', '=', 'invoice_details.inv_id')->join('transactions', 'invoices.trans_id', '=', 'transactions.id')
           ->select(
               DB::RAW('product_details.id AS id'),
               DB::RAW('product_details.code AS item_code'),
               DB::RAW('product_details.name AS name'),
               DB::RAW('product_details.description AS description'),
               DB::RAW('invoice_details.price AS price'),
               DB::RAW('invoice_details.quantity AS qty'),
               DB::RAW('invoice_details.price AS price'),
               DB::RAW('invoice_details.total_amount AS total'),
               DB::RAW('invoices.code AS receipt_code'),
               DB::RAW('invoices.process_status AS status'),
               DB::RAW('invoices.total_amount AS total_amount'),
               DB::RAW('invoices.net_tax AS net_tax'),
               DB::RAW('invoices.sub_total AS sub_total'),
               DB::RAW('invoices.client_id AS client_id'),
               DB::RAW('transactions.trans_date AS trans_date')
            )
           ->where('invoices.id', '=', $invoice->id)
           ->get()//->groupBy('receipt_code')
           ->map(function($sales){

            return $sales;
            
            
           });

      //  return $sales;
           
           
       return view('receipt.invoice')->with('sales', $sales);

    }


    public function viewInvoicedItems($id){
        
        $quotation = Invoice::findorFail($id);

        //dd($cash_sale->id);

        $items = DB::table('product_details')
           ->join('invoice_details', 'product_details.id', '=', 'invoice_details.prod_id')->join('invoices', 'invoices.id', '=', 'invoice_details.inv_id')->join('transactions', 'invoices.trans_id', '=', 'transactions.id')
           ->select(
               DB::RAW('product_details.id AS id'),
               DB::RAW('product_details.code AS item_code'),
               DB::RAW('product_details.name AS name'),
               DB::RAW('product_details.description AS description'),
               DB::RAW('invoice_details.id AS qd_id'),
               DB::RAW('invoice_details.price AS price'),
               DB::RAW('invoice_details.status AS qd_status'),
               DB::RAW('invoice_details.quantity AS qty'),
               DB::RAW('invoice_details.price AS price'),
               DB::RAW('invoice_details.total_amount AS total_amount'),
               DB::RAW('invoices.id AS q_id'),
               DB::RAW('invoices.code AS receipt_code'),
               DB::RAW('invoices.process_status AS status'),
               DB::RAW('invoices.total_amount AS total_amount'),
               DB::RAW('invoices.net_tax AS net_tax'),
               DB::RAW('invoices.sub_total AS sub_total'),
               DB::RAW('invoices.client_id AS client_id'),
               DB::RAW('transactions.trans_date AS trans_date')
            )
           ->where('invoices.id', '=', $quotation->id)
           //->where('quotation_details.status', 1)
           ->get();

      //  $items = $all_items->where('invoice_details.status', 1);

       // return $pend_items;

        return view('invoice.approve_items', compact('items'));
    }

    public function approveItem($id){

        $pending_item = InvoiceDetail::findOrFail($id);
        $pending_item->status = 1;
        $pending_item->save();
        return redirect()->back();

    }

    public function cancelItem($id){

        $pending_item = InvoiceDetail::findOrFail($id);
        $pending_item->status = 0;
        $pending_item->save();
        return redirect()->back();

    }


    public function approveInvoice($id){

        $app_quots = Invoice::findOrFail($id);

       // return $app_quots;
        $app_quots->process_status = 1;
        $app_quots->save();


        //update cash transaction table 

        $cash_trans = new CashTransaction();
        $cash_trans->t_no = "TRS-". $app_quots->code;
        $cash_trans->t_date = Carbon::now()->format("d/m/Y");
        $cash_trans->t_description = "Invoice Released";
        $cash_trans->t_debit/**(profit) */ = 0;
        $cash_trans->t_credit/**(loss) */ = $app_quots->total_amount;
        $cash_trans->t_balance =  0 - $app_quots->total_amount ;
        $cash_trans->save();




      //  return $app_quots;



        //update the stocks table

    //    $items = InvoiceDetail::where('status', '1')->where('inv_id',$app_quots->id)->get();

        $update = ['s.status' => '1'];

        $items = DB::table('invoice_details as i_d')->join('stocks as s', 'i_d.prod_id', 's.prod_id')->join('invoices as i', 'i.id', 'i_d.inv_id')->join('transactions as t', 't.id', 's.trans_id')
        ->select(
            DB::RAW('s.prod_id as product_name'),
            DB::RAW('s.status'))
        ->where('i.id', $app_quots->id)->where('t.trans_desc', 'like', '%Invoices%')->where('i_d.status', 1)->update($update);

       // return $items;

    //    $items->status = 1;
    //    $items->save();




        //return $items;

        




        alert()->success('Invoice Successfully Approved');

        return redirect()->route('view_invoices');
    }


    public function getApprovedInvoice($id){

        $invoice = Invoice::findorFail($id);

        $sales = DB::table('product_details')
           ->join('invoice_details', 'product_details.id', '=', 'invoice_details.prod_id')->join('invoices', 'invoices.id', '=', 'invoice_details.inv_id')->join('transactions', 'invoices.trans_id', '=', 'transactions.id')
           ->select(
               DB::RAW('product_details.id AS id'),
               DB::RAW('product_details.code AS item_code'),
               DB::RAW('product_details.name AS name'),
               DB::RAW('product_details.description AS description'),
               DB::RAW('invoice_details.price AS price'),
               DB::RAW('invoice_details.quantity AS qty'),
               DB::RAW('invoice_details.price AS price'),
               DB::RAW('invoice_details.total_amount AS total'),
               DB::RAW('invoices.id AS inv_id'),
               DB::RAW('invoices.code AS receipt_code'),
               DB::RAW('invoices.process_status AS status'),
               DB::RAW('invoices.total_amount AS total_amount'),
               DB::RAW('invoices.net_tax AS net_tax'),
               DB::RAW('invoices.sub_total AS sub_total'),
               DB::RAW('invoices.client_id AS client_id'),
               DB::RAW('transactions.trans_date AS trans_date')
            )
           ->where('invoices.id', '=', $invoice->id)
           ->get()//->groupBy('receipt_code')
           ->map(function($sales){

            return $sales;
            
            
           });

        //return $sales;
           
           
       return view('receipt.approved_invoice')->with('sales', $sales);

    }

    public function invoicePayment(Request $request, $id){


        // $lastInvoiceID = $ord->orderBy('id', 'desc')->pluck('id')->first();
        // $orderCodes = 'QUOT-' . str_pad($lastInvoiceID + 1, 4, "0", STR_PAD_LEFT);




      

        $invoices = Invoice::findOrFail($id);

        $inv_id = $invoices->id;
        $inv_code = $invoices->code;

        
        $cash_trans = new CashTransaction();
        $cash_trans_all = $cash_trans::where('t_no', 'LIKE', '%TRS-%'. $inv_code)->get();

        // $existing_code = $cash_trans::where('t_no', 'LIKE', '%TRS-%'. $inv_code . '%-P-%')->get();

        // $j = $existing_code->pluck('t_no')->first();

        // $new_j = $j + 1;

        // return $new_j;      
        
        //$other = $cash_trans_all->where('t_no', 'LIKE', '%-P-%')->get();


        //return $other;
        
        $current_code =  $cash_trans_all->pluck('t_no')->first();
        
        $t_code = 0;
        
        $new_code = null;

       

       // return $t_array;
      

       do {

           $t_code ++;
           

           $t_array = $cash_trans::where('t_no', 'LIKE', '%TRS-%'. $inv_code . '-P-' . $t_code)->get();
           
           
           if(count($t_array)==0){
                
              
                $new_code = $current_code . '-P-'. $t_code;
            }

           
           
       } 
       
       while (!$new_code);



        

       // return $new_code;

       // $current_code = $current_code . '-P'; 

        //$orderCodes = 'QUOT-' . str_pad($current_code + 1, 4, "0", STR_PAD_LEFT);

        // $i = 0;
    
        // $orderCodes =   str_pad($current_code .'-P-' . $i++ , 4, "0", STR_PAD_RIGHT/**/);

        // while($i < count($current_code)){

            
        // }
    
    

     //   return $orderCodes;

        // for ($i =0; $i < count($current_code)  ; $i++) { 
        
        //      
        // }

        

       // return $orderCodes; 

        //$old_code = $cash_trans_all->first()->t_no;

       // $i = 0;

        // for ($i=0; $i < count($cash_trans_all); $i++) { 
        //     # code...

        //     $new_code = $cash_trans_all->t_no[$i] . '-' . $i++;
        // }

        // while($i < count($cash_trans_all)){

        //      
        // }

        // return $new_code;




      //  return $inv_id;

        $inv_pay = new InvoicePayment();

        $inv_pay->inv_id = $inv_id;
        $inv_pay->amount_paid = $request->amount_paid;
        $inv_pay->save();

        $cash_trans = new CashTransaction();
        $cash_trans->t_no = $new_code;
        $cash_trans->t_date = Carbon::now()->format("d/m/Y");
        $cash_trans->t_description = "Invoice Paid";
        $cash_trans->t_debit/**(profit) */ = $request->amount_paid;
        $cash_trans->t_credit/**(loss) */ = 0;
        $cash_trans->t_balance =  $request->amount_paid;
        $cash_trans->save();

        alert()->success('Payment successfully made');

        return redirect()->back();
        
        





    }

    public function test(){

        $cash_trans = new CashTransaction();
        $cash_trans_all = $cash_trans::where('t_no', 'LIKE', '%TRS-INV-%')->get();

        $lastInvoiceID = $ord->orderBy('id', 'desc')->pluck('id')->first();
        $orderCodes = 'QUOT-' . str_pad($lastInvoiceID + 1, 4, "0", STR_PAD_LEFT);

         
        $old_code = $cash_trans_all->first()->t_no;

        $i = 0;

        while($i < 5){

            $new_code = $old_code . '-' . $i++; 
        }
        
        return $new_code;

    }
}
