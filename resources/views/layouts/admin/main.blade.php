<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Corpy">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- Bootstrap core CSS-->
    <link href="/assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap RTL CSS-->
    {{-- <link href="/css/bootstrap-rtl.min.css" rel="stylesheet"> --}}
    <!-- Icon fonts-->
    <link href="/assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="/assets/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Main styles -->
    <link href="/assets/admin/css/admin.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="/assets/admin/css/custom.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">

        <a class="navbar-brand" href="">
            <img
                src=""
                data-retina="true"
                alt=""
                height="36"
            >
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            @include('includes.admin.sidebar')
            @include('includes.admin.navbar')
        </div>
    </nav>
    <div class="content-wrapper">
        <div class="container-fluid">
            @include('includes.admin.breadcrumbs')
                @include('includes.admin.results')
                @include('includes.admin.errors')
                @yield('content')
        </div>
    </div>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Corpy 2019</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="/assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="/assets/admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/assets/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="/assets/admin/vendor/jquery.selectbox-0.2.js"></script>
    <script src="/assets/admin/vendor/retina-replace.min.js"></script>
    <script src="/assets/admin/vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/assets/admin/js/admin.js"></script>
    <!-- Custom scripts for this page-->
    @if (Request::is('/admin'))
        <script src="/assets/admin/vendor/chart.js/Chart.js"></script>
        <script src="/assets/admin/js/admin-charts.js"></script>
    @endif
    <script src="/assets/admin/js/admin-datatables.js"></script>
    <script src="/assets/admin/vendor/ckeditor/ckeditor.js"></script>
    <script src="/assets/admin/js/custom.js"></script>
    @include('includes.admin.js.ajax')
    <script>  CKEDITOR.replace( document.querySelector('#editor') );</script>

    @yield('customJs')

</body>

</html>
