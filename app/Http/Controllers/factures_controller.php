<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\factures;
use App\Models\products;
use App\Models\suppliers;
use App\Models\customer_list;
use Session;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;

class factures_controller extends Controller
{
    //------- Get factures --------//
    public function factures(){
        if(Auth::check()){
            $data = products::where('quantity', '<=' , 5)->get();
            $suppliers_data = suppliers::all();
            return view('factures',['data' => $data,'suppliers_data' => $suppliers_data]);
        }
        return redirect()->back('login');
    }
    //------- Get Sales invoice --------//
    public function sales_invoice(){
        if(Auth::check()){
            //$user_name = Auth::user()->name;
            $data = products::all();
            $customer_data = customer_list::all();  
            return view('sales_invoice',['data' => $data , 'customer_data' => $customer_data]);
        }
        return redirect()->back('login');
    }
    //------- Post factures --------//
    public function create(Request $data ){
              $date = $data->date;
              $supplier = $data->supplier;
              $product= $data->product;
              $quantity= $data->quantity;
              $price= $data->price;
              $payment= $data->payment;
              $taype= $data->taype;
              $total = 0;
              $count = count($price);
              $facture_data = factures::all()->last();
            if (!empty($facture_data)) {
                $fc_id = $facture_data->fc_id ;
                $fc_id ++;}else $fc_id = 1;
              for ($i=0; $i < $count; $i++) 
              //foreach($price as $key => $no)
              {
                  if($price[$i] > 0){
                      
                $input['date'] = $date;
                $input['supplier'] = $supplier;
                $input['product'] = $product[$i];
                $input['quantity'] = $quantity[$i];
                $input['price'] = $price[$i];
                $input['payment'] = $payment;
                $input['fc_id'] = $fc_id;
                $input['taype'] = $taype;
                $input['total'] = ($price[$i] * $quantity[$i]);
                if($payment == 'credit'){
                    $input['credit'] = ($price[$i] * $quantity[$i]);
                    $total += $input['credit'];
                }
                //------- Calcule stock & price -------------// cast_to_number('123');
                if ($taype == "sell") {
                    # code...
                $stock = products::where('name', $product[$i])->first();
                $calcul_quantity = $quantity[$i] + $stock->quantity;
                $calcul_total = ($stock->price * $calcul_quantity);
                products::where('name', $product[$i])
                            ->update(['quantity' => $calcul_quantity , 'total' => $calcul_total]);
                    }
                //------- End Calcule stock -------------//
                //------- Calcule stock  sales parte-------------// cast_to_number('123');
                else{
                $stock = products::where('name', $product[$i])->first();
                $calcul_quantity = $stock->quantity - $quantity[$i]  ;
                $calcul_total = ($stock->price * $calcul_quantity);
                products::where('name', $product[$i])
                            ->update(['quantity' => $calcul_quantity , 'total' => $calcul_total]);}
                //------- End Calcule stock -------------//
                factures::create($input);
                  }
              }
              if ($taype == "sell") {
              $suppliers_credit = suppliers::where('name', $supplier)->first();
              $total = $total + (int)$suppliers_credit->credit;
              suppliers::where('name', $supplier)
                         ->update(['credit' => $total]);
              }
            //--------- edit total cridet sales parte------->>
            else {
                $customer_data = customer_list::where('name', $supplier)->first();
                $total = $total + (int)$customer_data->credit;
                customer_list::where('name', $supplier)
                            ->update(['credit' => $total]);
            }
                return redirect()->route('print.factures',$fc_id);
    }
    //---------------//
    public function factures_list()
    {
        $data = factures::all();
        $fc_data = factures::whereNotNull('fc_id')->get()->groupBy('fc_id');
        $data_unique = $data->unique('fc_id');
        return view('factures_list' , ['fc_data' => $fc_data ,'data_unique' => $data_unique]);
    }
    //---------------//
    public function destroy($id)
    {
        $post = factures::where('id',$id)->first();
        $post->delete();
        return redirect()->back();
    }
    
}
