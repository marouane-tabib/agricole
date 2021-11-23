<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\factures;
use App\Models\suppliers;
use App\Models\customer_list;
use App\Models\pays;
use Session;
use Illuminate\Support\Facades\Auth;


class pays_controller extends Controller
{
    public function pays(){
        if(Auth::check()){
            $data = pays::all();
            $customer_data = customer_list::all();
            $supplier_data = suppliers::all();
            return view('pay',['data' => $data , 'cs_data' => $customer_data, 'sp_data' => $supplier_data ]);
        }
        return redirect()->back('login');
    }
    //------- Post Pay --------//
    public function create(Request $data){
        $data->validate([
            'supplier' => 'required|min:2',
            'price' => 'required',
            'date' => 'required|date',
            'check_number' => 'required|integer',
              ]);
              $suppliers_data = suppliers::where('name' , $data->supplier)->first();
              $customer_data = customer_list::where('name' , $data->supplier)->first();
              if ($suppliers_data) {
                    $credit = $suppliers_data->credit - $data->price;
              }else {
                $credit = $customer_data->credit - $data->price;
              }
        pays::create([
            'supplier' => $data->supplier,
            'price' => $data->price,
            'date' => $data->date,
            'check_number' => $data->check_number,
            'credit' => $credit,
        ]);
        if ($suppliers_data) {
            suppliers::where('name', $data->supplier)
                        ->update(['credit' => $credit]);
        }else {
            customer_list::where('name', $data->supplier)
                                ->update(['credit' => $credit]);
        }
        return redirect()->back();
        
    }
    //---------------//
    public function fc_pay($id){
        $data = pays::where('id' , $id)->first();
        $fc_data = suppliers::where('name' , $data->supplier)->first();
        if (!$fc_data) {
            $fc_data = customer_list::where('name', $data->supplier)->first();
        }
        return view('fc_pay',['data' => $data , 'fc_data' => $fc_data]);
    }
}
