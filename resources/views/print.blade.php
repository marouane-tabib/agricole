@extends('layouts.app')
@section('title','Print Factures')
@section('content')
@php $i=0; @endphp
    <section class="global bg-light shadow ">
        <div class="col-12">
            <img style="display: flex" src="{{ URL::asset('img/logo.png')}}" class="img-fluid mx-auto">
        </div><br>
        <div class="col-12 row" style="text-align: center">
            <div class="col-4">
                <div class="col-12">{{ $first_colum->payment }} :  طريقة الدفع</div>
                <div class="col-12">{{ $first_colum->supplier }} : إسم العميل</div>
            </div>
            <div class="col-4">
                <div class="col-12">{{ $first_colum->fc_id }} : رقم الفاتورة</div>
                <div class="col-12">{{ $first_colum->date }} : تاريخ الفاتورة</div>
            </div>
            <div class="col-4">
                @if ($first_colum->taype == 'buy')
                    <b class="h4">فاتورة المشتريات</b>
                @else
                    <b class="h4">فاتورة المبيعات</b>
                @endif
            </div>
        </div><br>
    <!-- Items table -->
        <table class="global table bg-white mt-3 container shadow" id="myTable" lang="ar" dir="rtl">
            <thead>
            <tr class="text-centr">
                <th scope="col">#</th>
                <th scope="col">اسم الصنف</th>
                <th scope="col">الكمية</th>
                <th scope="col">سعر البيع</th>
                <th scope="col">المجموع</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $row) 
                    @php $i++; @endphp
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $row->product }}</td>
                        <td>{{ $row->quantity}}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->total }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    <!-- fotter -->
        <section class="container">
            <div class="col-12">
                <b class="h5"> DH {{ $data->sum('total') }} : إجمالي الفاتورة</b>
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