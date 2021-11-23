@extends('layouts.app')
@section('title','supplier list')
@section('content')
@php $i=0; @endphp
    <!-- add supplier -->
     <form action="{{ route('supplier_list')}}" method="post">
                    @csrf
        <section class="global mx-auto col-12">
            <center><h5><b>إضافة مورد</b></h5></center>
            <div class="row col">
                <div class="col-md-4">
                    <b>Supplier name</b>
                    <input type="text" name="name" placeholder="Add name Product " class="form-control" required>
                </div>
                <div class="col-md-4">
                    <b>Phone</b>
                    <input type="text" name="phone" placeholder="Add product Price (number)" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>Check namber</b>
                    <input type="text" name="description" placeholder="Add product quantity (number)" id="" class="form-control"required>
                </div>
            </div><br>
                <input type="submit" value="Send" name="btn" class="btn btn-info col-md-2 col-12">
        </section></form>
    <!-- Total Price -->
        <section class="global mx-auto text-centre col-12">
            <span class=""><b>TOTAL:  <span class="h4">{{ $data->sum('credit') }}</span></b></span>
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
                <th scope="col">Phone</th>
                <th scope="col">Check namber</th>
                <th scope="col">Credit Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delate</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $row) 
                    @php $i++; @endphp
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->phone}}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->credit }}</td>
                        <td><a href="{{ route('edit.supplier',$row->id)}}" style="color: green"><i class="fas fa-user-edit"></i></a></td>
                        <td><a href="{{ route('destroy.supplier',$row->id)}}" style="color: red"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
    
            </tbody>
        </table>
@endsection