@extends('layouts.app')
@section('title','Home')
@section('content')
@php $i=0; @endphp
    <!-- add pr -->
        <form action="{{ route('home')}}" method="post">
        @csrf
            <section class="global mx-auto col-12 no_print">
                <center><h5><b>إضافة منتج</b></h5></center>
                <div class="row col">
                    <div class="col-md-4">
                        <b>Name</b>
                        <input type="text" name="name" placeholder="Add name Product " id="" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <b>Price</b>
                        <input type="number"step="any" name="price" placeholder="Add product Price (number)" id="" class="form-control"required>
                    </div>
                    <div class="col-md-4">
                        <b>Quantity</b>
                        <input type="number" step="any" name="quantity" placeholder="Add product quantity (number)" id="" class="form-control"required>
                    </div>
                </div><br>
                    <input type="submit" value="Send" name="btn" class="btn btn-info col-md-2 col-12">
            </section>
        </form>
    <!-- Total Price -->
        <section class="global total mx-auto text-centre col-12">
            <span class=""><b>TOTAL:  <span class="h4">{{ $data->sum('total') }}</span></b></span>
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
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th class="no_print" scope="col">Delate</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $row) 
                    @php $i++; @endphp
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->quantity}}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->total }}</td>
                        <td class="no_print"><a href="{{ route('destroy',$row->id)}}" style="color: red"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
@endsection