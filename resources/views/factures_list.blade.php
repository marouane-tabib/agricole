@extends('layouts.app')
@section('title','Factures list')
@section('content')
@php $i=0; @endphp
    <!-- Searsh btn 
            <section style="display:block;margin-top:20px" class="global mx-auto text-centre col-12 no_print row">
                <b class="h5" style="display: block; text-align:center">البحث عن فاتورة</b>
                @include('layouts.search_btn')
            </section>-->
    <!-- Items table -->
        <table class="global table bg-white mt-3 container" id="myTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pack</th>
                <th scope="col">Facture Number</th>
                <th scope="col">Taype</th>
                <th scope="col">Supplier/Customer</th>
                <th scope="col">Print</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data_unique as $row)
                @php $i++; @endphp
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <th>@foreach ($fc_data[$row->fc_id] as $row) {{ $row->product }} {{ $row->quantity }} x {{ $row->price }} = {{ $row->total }} <br> @endforeach</th>
                        <th>{{ $row->fc_id }}</th>
                        <th class="{{ $row->taype }}">{{ $row->taype }}</th>
                        <th>{{ $row->supplier }}</th>
                        <th><a href="{{ route('print.factures',$row->fc_id) }}">Print</a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script src="{{ URL::asset('js/global.js')}}"></script>
@endsection