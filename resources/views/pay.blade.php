@extends('layouts.app')
@section('title','Pay Facture')
@section('content')
    <!-- add Pay culomen -->
        <form action="{{ route('pay') }}" method="post">
        @csrf
            <section class="global mx-auto col-12 no_print">
                <center><h5><b>إضافة ورقة الإستخلاص</b></h5></center>
                <div class="row col">
                    <div class="col-md-4">
                        <b>Customer / Supplier Name</b>
                        <select class="form-control" name='supplier'>
                            <option value="">---</option>
                            @foreach ($sp_data as $sp_row)
                                <optgroup label="Customers">
                                    <option value="{{ $sp_row->name }}">{{ $sp_row->name }}  ({{ $sp_row->credit }})</option>
                                </optgroup>
                            @endforeach
                            @foreach ($cs_data as $cs_row)
                                <optgroup label="Customers">
                                    <option value="{{ $cs_row->name }}">{{ $cs_row->name }}  ({{ $cs_row->credit }})</option>
                                </optgroup>
                            @endforeach
                                
                        </select>
                    </div>
                    <div class="col-md-4">
                        <b>Price</b>
                        <input type="number" name="price" placeholder="Add product Price (number)" id="" class="form-control"required>
                    </div>
                    <div class="col-md-4">
                        <b>date</b>
                        <input type="date" name="date" placeholder="Add product quantity (number)" id="" class="form-control"required>
                    </div>
                    <div class="col-md-4">
                        <b>chack_number</b>
                        <input type="chack_number" name="check_number" placeholder="Add product quantity (number)" id="" class="form-control"required>
                    </div>
                </div><br>
                    <input type="submit" value="Send" name="btn" class="btn btn-info col-md-2 col-12">
            </section>
        </form>
    <!-- Total Price -->
        <section class="global total mx-auto text-centre col-12">
            <span class=""><b>TOTAL Credit:  <span class="h4">{{ $data->sum('credit') }}</span></b></span>
        </section>
    <!-- Searsh btn -->
        <section class="global mx-auto text-centre col-12 no_print">
            <b class="h5" style="display: block; text-align:center">البحث عن ورقة الإستخلاص</b>
            @include('layouts.search_btn')
        </section>
    <!-- Items table -->
        <table class="global table bg-white mt-3 container" id="myTable">
            <thead>
            <tr>
                <th scope="col">Pay ID</th>
                <th scope="col">Customer / Supplier Name</th>
                <th scope="col">Check number</th>
                <th scope="col">Pay price</th>
                <th scope="col">Credit</th>
                <th scope="col">Date</th>
                <th scope="col">Print</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $row) 
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->supplier }}</td>
                        <td>{{ $row->check_number}}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->credit }}</td>
                        <td>{{ $row->date }}</td>
                        <td><a href="{{ route('print.pay' , $row->id) }}">Print</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection