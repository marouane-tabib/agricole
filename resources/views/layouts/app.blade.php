<?php ob_start('compress_page');?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS link -->
    <link rel="stylesheet" href="{{ URL::asset('css/home.css')}}">
    <!-- Icon Link -->
    <link rel="icon" href="{{ URL::asset('img/icon.png')}}" />
    <!-- boostrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    @if ($errors->any())
      <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
              <ul>
                  <b>{{ $error }}</b><br>
              </ul>
          @endforeach
      </div>
    @endif
    @foreach ($errors as $error)
    <div class="alert alert-danger">
            <ul>
                <b>{{ $error }}</b><br>
            </ul>
    </div>
    @endforeach
    <section class="container">
    <!-- nav bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light no_print">
            <a class="navbar-brand" href="{{ route('home')}}">إضافة منتج</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('stock')}}">مخزون</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('factures')}}">فاتورة مشتريات</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('sales_invoice')}}">فاتورة المبيعات</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('supplier_list')}}">قائمة الموردين</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('customer_list')}}">قائمة العملاء</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('reports')}}">التقارير</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('factures.list')}}">قائمة الفواتير</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('pay')}}"> ورقة الإستخلاص </a>
                </li>
              </ul>
            </div>
          </nav>
    @yield('content')</section>
    <br>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('js/global.js')}}"></script>
    <?php   
ob_end_flush();
function compress_page($buffer) {
    $search = array("/>[[:space:]]+/", "/[[:space:]]+</");
    $replace = array(">","<");
    return preg_replace($search, $replace, $buffer);
}?>
</body>
</html>