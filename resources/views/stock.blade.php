@extends('layouts.app')
@section('title','Stock')
@section('content')
    <!-- Total Price -->
        <section class="global mx-auto text-centre col-12">
            <span class=""><b>TOTAL:  <span class="h4">{{ $data->sum('total') }}</span></b></span>
        </section>
    <!-- Stock section -->
        <section class="container test-center"><br>
            @foreach ($data as $row)
                <div class="alert shadow" style="color: white;background:rgb(201, 43, 43)" role="alert">
                <b>!!-- Name: {{ $row->name }} |
                    Quantity: {{ $row->quantity }} |
                    Price:  {{ $row->price }} |
                    Total:  {{ $row->total }} | <a href="{{ route('destroy',$row->id) }}">Delate</a> --!!</b>
                </div>
            @endforeach
        </section>
@endsection