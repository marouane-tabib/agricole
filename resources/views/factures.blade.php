@extends('layouts.app')
@section('title','Factures')
@section('content')
    <!-- add factures -->
        <form action="{{ route('factures')}}" method="post">
        @csrf
        <input style="display: none" type="text" value="sell" name="taype">
            <section class="global mx-auto col-12">
                <center><h4><b>فاتورة مشتريات</b></h4></center>
                <div class="row col">
                    <div class="col-md-4">
                        <b>date</b>
                        <input type="date" name="date" placeholder="Add product date" id="" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <b>Mode Payment</b>
                        <select name="payment" id="" class="form-control">
                            <option value="cash">cash</option>
                            <option value="credit">credit</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <b>The supplier</b>
                        <b>Products</b>
                        <select name="supplier" class="form-control" id="">
                            <option value="">---</option>
                            @foreach ($suppliers_data as $row)
                                <option value="{{ $row->name}}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><br>
                
                @foreach ($data as $row)
                    <div class="row col">
                        <div class="col-md-3">
                            <b>Products</b>
                            <select name="product[]" class="form-control" id="">
                                <option value="">---</option>
                                @foreach ($data as $row)
                                <option value="{{ $row->name}}">{{ $row->name}} ({{ $row->quantity }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <b>Quantity</b>
                            <input type="number" step="any" name="quantity[]" placeholder="Add product quantity (number)" id="quantity" class="form-control" >
                        </div>
                        <div class="col-md-3">
                            <b>Price</b>
                            <input type="number" step="any" name="price[]" placeholder="Add product price (number)" id="price" class="form-control" >
                        </div>
                        <div class="col-md-3">
                             <b>TOTAL: <br> <span id="child_total"></span></b><br> 
                        </div>
                    </div><br>
                @endforeach<hr>
                    <input type="submit" value="Send" name="btn" class="btn btn-info col-md-2 col-12">
            </section>
        </form>
@endsection