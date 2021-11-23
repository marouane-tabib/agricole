@extends('layouts.app')
@section('title','supplier list')
@section('content')
@php $i=0; @endphp
    <!-- add customer -->
     <form action="{{ route('customer_list')}}" method="post">
                    @csrf
        <section class="global mx-auto col-12 no_print">
            <center><h5><b>إضافة عميل</b></h5></center>
            <div class="row col">
                <div class="col-md-4">
                    <b>Customer name</b>
                    <input type="text" name="name" placeholder="Add Name Customer " id="" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <b>City</b>
                    <input type="text" name="city" placeholder="Add Customer City" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>Phone</b>
                    <input type="text" name="phone" placeholder="Add Customer Phone (number)" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>ID Card</b>
                    <input type="text" name="id_card" placeholder="Add Customer ID Card" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>Check namber</b>
                    <input type="text" name="description" placeholder="Add Description" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>Max Price</b>
                    <input type="number" name="fc_max" placeholder="Add Max Price (number)" id="" class="form-control"required>
                </div>
            </div><br>
                <input type="submit" value="Send" name="btn" class="btn btn-info col-md-2 col-12">
        </section></form>
    <!-- Total Price -->
        <section class="global mx-auto text-centre col-12">
            <span class=""><b>TOTAL Customer Credit:  <span class="h4">{{ $data->sum('credit') }}</span></b></span>
        </section>
    <!-- Searsh btn -->
        <section class="global mx-auto text-centre col-12 no_print">
            <b class="h5" style="display: block; text-align:center">البحث عن المنتج</b>
            @include('layouts.search_btn')
        </section>
    <!-- Items table -->
        <table class="global table bg-white mt-3 container" id="myTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Phone</th>
                <th scope="col">ID Card</th>
                <th scope="col">Check namber</th>
                <th scope="col">Max Price</th>
                <th scope="col">Credit Price</th>
                <th scope="col no_print">Edit</th>
                <th scope="col no_print">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $row) 
                    @php $i++; @endphp
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->city}}</td>
                        <td>{{ $row->phone}}</td>
                        <td>{{ $row->id_card}}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->fc_max }}</td>
                        <td>{{ $row->credit }}</td>
                        <td class="no_print"><a href="{{ route('edit.customer',$row->id)}}" style="color: green"><i class="fas fa-user-edit"></i></a></td>
                        <td class="no_print"><a href="{{ route('destroy.customer',$row->id)}}" style="color: red"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
    
            </tbody>
        </table>
@endsection