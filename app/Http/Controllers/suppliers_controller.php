<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suppliers;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class suppliers_controller extends Controller
{
    
    //------- Get Supplier --------//
    public function supplier(){
        if(Auth::check()){
            //$user_name = Auth::user()->name;
            $data = suppliers::all();
            return view('supplier_list',['data'=> $data]);
        }
}
    //------- Post Supplier --------//
    public function create(Request $data){
        $data->validate([
            'name' => 'required|min:2|max:40',
            'phone' => 'required',
            'description' => 'required|min:1',
              ]);
        suppliers::create([
            'name' => $data->name,
            'phone' => $data->phone,
            'description' => $data->description,
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
            $data = suppliers::find($id);
            return view('supplier_update',['data' => $data]);
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
            'description' => 'required|min:1',
              ]);
        suppliers::find($id)->update([
            'name' => $data->name,
            'phone' => $data->phone,
            'description' => $data->description,
        ]);
        return redirect()->route('supplier_list');

    }
    //---------------//
    public function destroy($id)
    {
        $post = suppliers::where('id',$id)->first();
        $post->delete();
        return redirect()->back();
    }
}
