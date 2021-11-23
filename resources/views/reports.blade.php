@extends('layouts.app')
@section('title','Reports')
@section('content')
@php $i=0; @endphp
<br>
  <canvas class="global bg-white shadow col-12" id="myChart"></canvas>
  <!-- Searsh btn -->
    <section class="global mx-auto text-centre col-12 no_print">
      <b class="h5" style="display: block; text-align:center">البحث عن المنتج</b>
      <form action="{{ route('reports')}}" method="POST">
        @csrf
        <input type="number" name="date" placeholder="Add your year YYYY" id="" class="form-control col-md-6">  <hr>
        <input type="submit" value="Send" class="btn btn-info">
      </form>
    </section>
  <!-- Items table -->
    <table class="global table bg-white mt-3 container" id="myTable">
      <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Product</th>
          <th scope="col">Type</th>
          <th scope="col">Supplier</th>
          <th scope="col">Total</th>
          <th scope="col">Payment</th>
          <th scope="col">Date</th>
          <th class="no_print" scope="col">Delate</th>
      </tr>
      </thead>
      <tbody>
          @foreach ($data as $row) 
              @php $i++; @endphp
              <tr>
                  <th scope="row">{{ $i }}</th>
                  <td>{{ $row->product }}</td>
                  <td class="{{ $row->taype}}">{{ $row->taype }}</td>
                  <td>{{ $row->supplier}}</td>
                  <td>{{ $row->total }}</td>
                  <td>{{ $row->payment }}</td>
                  <td>{{ $row->date }}</td>
                  <td class="no_print"><a href="{{ route('destroy.factures',$row->id)}}" style="color: red"><i class="fas fa-trash-alt"></i></a></td>
              </tr>
          @endforeach

      </tbody>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // === include 'setup' then 'config' above ===
    const labels = ['0','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
          enter_monthly = [ @for ($i = 0; $i <= 12; $i++)'{!! $date[$i]->sum('total') !!}', @endfor];
          net_income = [ @for ($i = 0; $i <= 12; $i++)'{!! ($date[$i]->sum('total') - $date[$i]->sum('credit')) !!}', @endfor];

      const data = {
        labels: labels,
        datasets: [{
          label: 'الدخل شهري',
          borderColor: 'rgb(255, 13, 132)',
          fill: true,
          data: enter_monthly,
        },{
          label: ' الدخل الصافي ',
          borderColor: 'rgb(255, 99, 132)',
          fill: true,
          data: net_income,
        },]
      };
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
</script>
@endsection