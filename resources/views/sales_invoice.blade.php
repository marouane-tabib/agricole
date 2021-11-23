@extends('layouts.app')
@section('title','sales invoice')
@section('content')
    <!-- add pr -->
        <form action="{{ route('sales_invoice')}}" method="post">
        @csrf
        <input style="display: none" type="text" value="buy" name="taype">
            <section class="global mx-auto col-12">
                <center><h4><b>فاتورة المبيعات</b></h4></center>
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
                        <b>The customer</b>
                        <select name="supplier" class="form-control" id="">
                            <option value="">---</option>
                            @foreach ($customer_data as $row)
                            <option value="{{ $row->name}}">{{ $row->name}} ({{$row->fc_max - $row->sum('credit')}})</option>
                            @endforeach
                        </select>
                    </div>
                </div><br>

                @foreach ($data as $rows)
                    <div class="row col">
                        <div class="col-md-3">
                            <b>Products</b>
                            <select name="product[]" class="form-control" id="">
                                <option value="">---</option>
                                @foreach ($data as $row)
                                <option value="{{ $row->name}}">{{ $row->name}} ({{ $row->quantity}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <b>Quantity</b>
                            <input type="number"step="any" name="quantity[]" placeholder="Add product quantity (number)" id="quantity" class="form-control" >
                        </div>
                        <div class="col-md-3">
                            <b>Price</b>
                            <input type="number"step="any" name="price[]" placeholder="Add product price (number)" id="price" class="form-control" >
                        </div>
                        <div class="col-md-3">
                             <b>TOTAL: <br> <span class="h5" id="child_total"></span></b><br> 
                        </div>
                    </div><br>
                @endforeach<hr>
                    <input type="submit" value="Send" name="btn" class="btn btn-info col-md-2 col-12">
            </section>
        </form>
        <!-- jquery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
        <script>
            
        $('input[name^=price]').keyup(function(){
            var quantity = $(this).parent().prev().children("input").val(),
                price = $(this).val(),
                child_total = (quantity * price)/2,
                princip_total = (child_total += child_total);
                $(this).parent().next().children("b").children("span").text(price * quantity);
        });
        $('input[name^=quantity]').keyup(function(){
            var quantity = $(this).parent().next().children("input").val(),
                price = $(this).val(),
                child_total = (quantity * price)/2,
                princip_total = (child_total += child_total);
                //$('#princip_total').text(princip_total);
                $(this).parent().next().next().children("b").children("span").text(price * quantity);
        });
        </script>
@endsection