<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ALU-System | {{ __('dashboard.Dashboard') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <!-- <link rel="stylesheet" href="./../dist/css/adminlte.min.css"> -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    
<!-- noto kufi font  -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap">

</head>
<style>
  .odd td::before {
    right: 14px !important;

  };
  .odd td{
    padding-right: 40px !important;
  }
  .even td::before{
    right: 14px !important;

  }
  .small-box{
      height: 200px;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link logout" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>


    </ul>

      <div class="container" style="justify-content: center">
          <div class="row">
              <div class="col">
                  {{-- <div class="logo">
                      <img alt="user-img" width="100px;" height="60px" src="{{URL::asset('dist/img/rtx.png')}}">
                  </div> --}}
              </div>
          </div>
      </div>

      <ul class="navbar-nav mr-auto-navbav">
           <li class="nav-item  d-sm-inline-block">
              <a class=" logout" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  تسجيل الخروج

                 {{-- <i class="fa fa-lock"></i> --}}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </li> 
          {{-- <li class="nav-item  d-sm-inline-block">
              <button class="btn btn-success m-b-10 m-l-5 float-left " style="margin-right: 5px" onclick="goBack()">

                  رجوع
              </button>
          </li> --}}
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" ;>
    <!-- Brand Logo -->
    <a href="{{url('/')}}" style="text-align: center" class="brand-link">
{{--      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--           style="opacity: .8">--}}
      <span class="brand-text font-weight-light">ALU-System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



          <li class="nav-item">
            <a href="{{route('slider.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                سلايدر الصفحة الرئيسية
{{--                <span class="badge badge-info right">2</span>--}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('machines.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                الماكينات
{{--                <span class="badge badge-info right">2</span>--}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('projects.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                المشاريع
{{--                <span class="badge badge-info right">2</span>--}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                الاقسام
{{--                <span class="badge badge-info right">2</span>--}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                المنتجات
{{--                <span class="badge badge-info right">2</span>--}}
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{route('clients.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                العملاء
{{--                <span class="badge badge-info right">2</span>--}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('certificates.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                الشهادات
{{--                <span class="badge badge-info right">2</span>--}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('messages.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                طلبات التواصل
{{--                <span class="badge badge-info right">2</span>--}}
              </p>
            </a>
          </li>

          

          <li class="nav-item">
            <a href="{{route('partner.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                 الشركاء
{{--                <span class="badge badge-info right">2</span>--}}
              </p>
            </a>
          </li>


{{--            <li class="nav-item">--}}
{{--                <a href="{{route('grades.index')}}" class="nav-link">--}}
{{--                    <i class="nav-icon far fa-image"></i>--}}
{{--                    <p>--}}
{{--                        الصفوف الدراسية--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}
           




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>








    @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Page specific script -->
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script>
    $(document).ready(function() {
        $('#project_id').select2({
            placeholder: 'Select a project',
            allowClear: true // Adds a clear button to the select box
        });
    });
</script>
<script>

  $(function () {

    $("#example1").DataTable({
  "language": {
    "search": "بحث:"
  },
  "responsive": true,
  "lengthChange": false,
  "autoWidth": false,
  "paging": false,
  "info": false,
  "buttons": ["csv", "excel", "pdf", "print"]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });

      $('#example3').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": false,
          "responsive": true,
      });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

</body>
</html>
