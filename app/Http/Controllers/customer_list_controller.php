<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer_list;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class customer_list_controller extends Controller
{
    
    //------- Get Supplier --------//
    public function customer_list(){
        if(Auth::check()){
            //$user_name = Auth::user()->name;
            $data = customer_list::all();
            return view('customer',['data'=> $data]);
        }
}
    //------- Post Supplier --------//
    public function create(Request $data){
        $data->validate([
            'name' => 'required|min:2|max:40',
            'phone' => 'required',
            'city' => 'required',
            'id_card' => 'required',
            'description' => 'required|min:1',
            'fc_max' => 'required|min:0',
              ]);
        customer_list::create([
            'name' => $data->name,
            'city' => $data->city,
            'phone' => $data->phone,
            'id_card' => $data->id_card,
            'description' => $data->description,
            'fc_max' => $data->fc_max,
        ]);
        return redirect()->back();
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $data = customer_list::find($id);
            return view('customer_update',['data' => $data]);
        }
        return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {
        $data->validate([
            'name' => 'required|min:2|max:40',
            'phone' => 'required',
            'city' => 'required',
            'id_card' => 'required',
            'description' => 'required|min:1',
            'fc_max' => 'required|min:0',
              ]);
        customer_list::find($id)->update([
            'name' => $data->name,
            'phone' => $data->phone,
            'city' =>$data->city,
            'id_card' => $data->id_card,
            'description' => $data->description,
            'fc_max' => $data->fc_max,
        ]);
        return redirect()->route('customer_list');

    }
    //---------------//
    public function destroy($id)
    {
        $post = customer_list::where('id',$id)->first();
        $post->delete();
        return redirect()->back();
    }
}
