<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetails;
use Carbon\Carbon;
use App\Models\Stock;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**description
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllProducts(){




        $products = DB::table('product_details')
            ->join('stocks', 'product_details.id', '=', 'stocks.prod_id')->join('stores', 'stores.id', '=', 'stocks.store_id')
            ->select(
                DB::RAW('product_details.id AS id'),
                DB::RAW('product_details.code AS code'),
                DB::RAW('stocks.prod_id AS prod_id'),
                DB::RAW('stocks.status AS status'),
                DB::RAW('product_details.name AS product_name'),
                DB::RAW('product_details.image AS image'),
                DB::RAW('product_details.offer_quantity AS offer_quantity'),
                DB::RAW('product_details.wholesale_price AS wholesale_price'),
                DB::RAW('product_details.offer_price AS offer_price'),
                DB::RAW('product_details.selling_price AS selling_price'),
                DB::RAW('product_details.category AS category'),
                DB::RAW('stores.store_name AS store_name'),
                DB::RAW('product_details.description AS descr'),
                DB::RAW('stocks.prod_id AS prod_id'), 
                DB::RAW('sum(stocks.qty) AS quantity'), 
                DB::RAW('stocks.*'))->where('stocks.status', '1')
            ->groupBy(
                DB::RAW('stocks.prod_id'))
            ->get()/*->map(function($products){
               
                 =$products->prod_id $prod_id;
                return $prod_id;
               })*/;
               //dd($products);

   //    $prod_id = $products->prod_id;
    //    foreach($products as $pro){
    //        //dd($pro->prod_id);
    //        $qtys = DB::table('stocks')
    //         ->join('stores', 'stores.id', '=', 'stocks.store_id')->select(
    //             DB::RAW('sum(qty) as total'), 
    //             DB::RAW('store_id'), DB::RAW('store_name') ,
    //             DB::RAW('prod_id'))->where('prod_id', '=', $pro->prod_id )
    //             ->where('stocks.status', '=', '1')
    //             ->groupBy('store_id')->get();
    //    }

    

        

        



        return view('product.list_of_products', compact('products'));


    }
    public function index()
    {
        //

        $products = ProductDetails::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('product.create');
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


       // dd($request->all());

        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required | min:3',
            'category' => 'required',
            'description' => 'required|unique:product_details',
            'code' => 'required|unique:product_details',
            'offer_quantity' => 'required',
            'wholesale_price' => 'required',
            'selling_price' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'offer_price' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $product = new ProductDetails();
        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->code = $request->input('code');
        $product->offer_quantity = $request->input('offer_quantity');
        $product->wholesale_price = $request->input('wholesale_price');
        $product->offer_price = $request->input('offer_price');
        $product->buying_price = $request->input('buying_price');
        $product->selling_price = $request->input('selling_price');
        $product->status = "1";







        if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->guessExtension();
            $file_name = time().'_'. $request->code . '.' . $ext;
            $file->move('images/', $file_name);
            $product->image = $file_name;

           

        }




        $product->save();

        alert()->success('Done','Product Successfully Added');

       // Toastr::success('Product Successfully Created', 'Success!!!');
        return redirect()->route('product.index');
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

        $product = ProductDetails::findOrFail($id);

        return view('product.edit', compact('product'));
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

        $product = ProductDetails::findOrFail($id);

        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->code = $request->input('code');
        $product->offer_quantity = $request->input('offer_quantity');
        $product->wholesale_price = $request->input('wholesale_price');
        $product->offer_price = $request->input('offer_price');
        $product->buying_price = $request->input('buying_price');
        $product->selling_price = $request->input('selling_price');

        $product->save();

        alert()->success('Done','Product Successfully Updated');

       // Toastr::success('Product Successfully Created', 'Success!!!');
        return redirect()->route('product.index');


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
