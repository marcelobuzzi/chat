<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <title>@yield('title')</title>

  <link href="{{asset('img/AdminLTELogo.png')}}" type="image/png" rel="icon" sizes="16x16 32x32">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{asset('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
  <link href="{{asset('css/styles.css')}}" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('css_personalizado')
</head>

<body id="page-top">

  <div id="wrapper">

    @include('layouts.sbadmin.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        @include('layouts.sbadmin.navbar')

        <div class="container-fluid">

          @yield('content_header')

          @yield('content')

        </div>

      </div>

      @include('layouts.sbadmin.footer')

    </div>

  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="ventanaModal" tabindex="-1" role="dialog">
    <div id='tipo-modal' class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content rounded-0">
      </div>
    </div>
  </div>

  <div class="modal" id="spinner" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard='false'>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="spinner-border text-primary mx-auto" role="status">
        <span class="sr-only">Procesando...</span>
      </div>
    </div>
  </div>

  <!-- <script src="{{asset('sbadmin/vendor/jquery/jquery.min.js')}}"></script> -->
  <script src="{{asset('js/jquery-3.6.4.min.js')}}"></script>
  <script src="{{asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('sbadmin/js/sb-admin-2.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('js/functions.js')}}"></script>
  @yield('js_personalizado')
</body>

</html>