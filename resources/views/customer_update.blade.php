@extends('layouts.app')
@section('title','supplier list')
@section('content')
@php $i=0; @endphp
    <!-- add customer -->
     <form action="{{ route('edit.customer' , $data->id)}}" method="post">
        @csrf
        <section class="global mx-auto col-12 no_print">
            <center><h5><b>تحديث معلومات العميل</b></h5></center>
            <div class="row col">
                <div class="col-md-4">
                    <b>Customer name</b>
                    <input type="text" name="name" value="{{ $data->name}}" placeholder="Add Name Customer " id="" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <b>City</b>
                    <input type="text" name="city" value="{{ $data->city}}" placeholder="Add Customer City" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>Phone</b>
                    <input type="text" name="phone" value="{{ $data->phone}}" placeholder="Add Customer Phone (number)" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>ID Card</b>
                    <input type="text" name="id_card" value="{{ $data->id_card}}" placeholder="Add Customer ID Card" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>Check namber</b>
                    <input type="text" name="description" value="{{ $data->description}}" placeholder="Add Description" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>Max Price</b>
                    <input type="number" name="fc_max" value="{{ $data->fc_max}}" placeholder="Add Max Price (number)" id="" class="form-control"required>
                </div>
            </div><br>
                <input type="submit" value="Send" name="btn" class="btn btn-info col-md-2 col-12">
        </section>
    </form>
@endsection