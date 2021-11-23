@extends('layouts.app')
@section('title','Print Pay Factures')
@section('content')
@php $i=0; @endphp
    <section class="global bg-light shadow ">
        <div class="col-12">
            <img style="display: flex" src="{{ URL::asset('img/logo.png')}}" class="img-fluid mx-auto">
        </div><br>
        <div class="col-12 row" style="text-align: center">
            <div class="col-4">
                <div class="col-12">{{ $data->supplier }} : توصلت من </div>
                <div class="col-12">{{ $data->price }} :  ماقدره</div>
            </div>
            <div class="col-4">
                <div class="col-12">{{ $data->id }} : رقم الفاتورة</div>
                <div class="col-12">{{ $data->date }} : تاريخ الفاتورة</div>
            </div>
            <div class="col-4">
                <b class="h4">ورقة الاستخلاص</b>
            </div>
        </div><br>
    <!-- fotter -->
        <section class="container">
            <div class="col-12">
                <b class="h5"><span class="h6">DH {{ $fc_data->credit + $data->price }}</span>  : إجمالي الديون</b><br>
                <b class="h5"><span class="h6">DH {{ $data->price }}</span>  : إجمالي المدفوع</b><br>
                <b class="h5"><span class="h6">DH {{ $fc_data->credit }}</span>  : المتبقي </b><br>
            </div>
            <div class="col-12">
                <b style="display: flex;justify-content:end" class="h4">: التواقيع</b>
            </div>
        </section><br>
        
        <div class="global shadow" style="font-size:14px" dir="ltr">
            <p style="color: white;">Ste Calendrier Agricole s.a.r.l - AU au capital 100 000.0 Dhs Siege Social : Rond-Ponte de Qallalsh - Mnasra Kenitra</p>
            <p style="color: white;">RC : 55849 - I.F 459 365 39 - Patente : 208 012 11 - ICE 002590487000059</p>
            <p style="color: white;">Tel : 06 66 33 22 69 - Email calendrieragricole@gmail.com - Face : calendrier agricol</p>
        </div>
    </section>
@endsection