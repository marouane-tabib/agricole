@extends('layouts.app')
@section('title','supplier list')
@section('content')
@php $i=0; @endphp
   <!-- add supplier -->
    <form action="{{ route('edit.supplier' , $data->id)}}" method="post">
        @csrf
        <section class="global mx-auto col-12">
            <center><h5><b>تحديث معلومات مورد</b></h5></center>
            <div class="row col">
                <div class="col-md-4">
                    <b>Supplier name</b>
                    <input type="text" name="name" value="{{ $data->name }}" placeholder="Add name Product " class="form-control" required>
                </div>
                <div class="col-md-4">
                    <b>Phone</b>
                    <input type="text" name="phone" value="{{ $data->phone }}" placeholder="Add product Price (number)" id="" class="form-control"required>
                </div>
                <div class="col-md-4">
                    <b>Check namber</b>
                    <input type="text" name="description" value="{{ $data->description }}" placeholder="Add product quantity (number)" id="" class="form-control"required>
                </div>
            </div><br>
                <input type="submit" value="Send" name="btn" class="btn btn-info col-md-2 col-12">
        </section>
    </form>
@endsection