<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\customer_list;
use App\Models\suppliers;
use App\Models\sales_invoice;
use App\Models\factures;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class global_controller extends Controller
{ 

    public function index(){
        if(Auth::check()){
            //$user_name = Auth::user()->name;
            $data = products::all();
            return view('home',['data'=> $data]);
        }
        return redirect()->route('login');
    }
    //---------------//
    public function create(Request $data)
    {
        $data->validate([
            'name' => 'required|min:4|max:40',
            'price' => 'required|min:-1',
            'quantity' => 'required|min:-1',
              ]);
        $total = $data->price * $data->quantity;
        products::create([
            'name' => $data->name,
            'price' => $data->price,
            'quantity' => $data->quantity,
            'total' => $total,
        ]);
        return redirect()->back();
    }
    //---------------//
    public function destroy($id)
    {
        $post = products::where('id',$id)->first();
        $post->delete();
        return redirect()->back();
    }
    //---------------//
    public function stock(){
        if(Auth::check()){
            $data = products::where('quantity', '<=', 5)->get();
            return view('stock',['data'=> $data]);
        }
        return redirect()->back('login');
    }
    //---------------//
    public function reports(){
        if(Auth::check()){
            $data = factures::all();
            $select_date = '20'.date('y');
            for ($i=0; $i <= 12; $i++) { 
                $month_data = factures::whereYear('date','=',$select_date)->whereMonth('date', '=', date($i))->where('taype','buy')->get();
                $date[$i] = $month_data;
            }
            return view('reports',['date'=> $date , 'data' => $data]);
        }
        return redirect()->back('login');
    }
    //---------------//
    public function select_date(Request $request){
            $data = factures::whereYear('date', '=', ($request->date))->get();
            for ($i=0; $i <= 12; $i++) { 
                $month_data = factures::whereYear('date','=',($request->date))->whereMonth('date', '=', date($i))->where('taype','buy')->get();
                $date[$i] = $month_data;
            }
            return view('reports',['date'=> $date , 'data' => $data]);
    }
    //---------------//
    public function print_fc($id){
        $data = factures::where('fc_id' , $id)->get();
        $first_colum = factures::where('fc_id' , $id)->first();
        return view('print',['data' => $data , 'first_colum' => $first_colum]);
    }

    
}
