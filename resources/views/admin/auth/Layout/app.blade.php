<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Admin</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{url('template/img/svg/logo.svg')}}" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{url('template/css/style.min.css')}}">

  {{-- <link rel="stylesheet" href="{{url('css/app.css')}}"> --}}
  <link rel="stylesheet" href="{{url('css/w3.css')}}">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"/>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <link rel="stylesheet" href="{{url('ckec/samples/css/samples.css')}}">
  <script type="text/javascript" src="{{url('ckec/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{url('ckec/samples/js/sample.js')}}"></script>
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">

    {{-- sidenav --}}
    @include('admin.auth.Layout.sidenav')

  <div class="main-wrapper">
    {{-- topnav --}}
    @include('admin.auth.Layout.topnav')

    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
          @yield('content')
      </div>
    </main>
    <!-- ! Footer -->
    <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>2021 © Libary Dashboard - <a href="Libary-dashboard.com" target="_blank"
          rel="noopener noreferrer">17/47cs/xp/0027</a></p>
    </div>
    <ul class="footer-end">
      <li><a href="##">Developed & Powered by <a href="" target="_blank">Owolabi Taofeeq Jimoh</a></a></li>
    </ul>
  </div>
</footer>
  </div>
</div>
<!-- Chart library -->
<script src="{{url('template/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{url('template/plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{url('template/js/script.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>

<script>
    initSample();

    function reprocess(){
        $("textarea[name='p_content']").html( CKEDITOR.instances['editor'].getData() );
        return true;
    }
</script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/r-2.2.7/sp-1.2.2/datatables.min.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
</body>

</html>
