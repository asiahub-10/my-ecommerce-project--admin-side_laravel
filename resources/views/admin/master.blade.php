<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/') }}admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/') }}admin/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="{{ asset('/') }}admin/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('/') }}admin/ckeditor/samples/js/sample.js"></script>
    <link rel="{{ asset('/') }}admin/ckeditor/samples/stylesheet" href="css/samples.css">
    <link rel="{{ asset('/') }}admin/ckeditor/samples/stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">

    <!-- Ajax table -->
    <link rel="stylesheet" href="{{ asset('/') }}admin/ajax-table/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="{{ asset('/') }}admin/ajax-table/css/style.min.css" />

    <style>
        .scroll-to-top {
            position: fixed;
            right: 1rem;
            bottom: 1rem;
            display: none;
            width: 2.75rem;
            height: 2.75rem;
            text-align: center;
            color: #7B7699;
            /*background: rgba(90, 92, 105, 0.5);*/
            /*text-shadow: -1px -3px 5px #000000;*/
            text-shadow: -5px -3px 4px #ffffff, -5px 0 4px #000000;
            line-height: 46px;
            /*font-size: 40px;*/
        }
        .scroll-to-top:hover {
            color: #808699;
        }
    </style>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('admin.includes.side-menu')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('admin.includes.header')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('body')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('admin.includes.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top bg-transparent" href="#page-top">
    {{--<i class="fas fa-angle-up"></i>--}}
    <i class="fas fa-3x fa-rocket" style="transform: rotate(-45deg)"></i>
    {{--<i class="fas fa-fighter-jet" style="transform: rotate(-90deg)"></i>--}}
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('/') }}admin/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('/') }}admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/') }}admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('/') }}admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('/') }}admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('/') }}admin/js/demo/chart-area-demo.js"></script>
<script src="{{ asset('/') }}admin/js/demo/chart-pie-demo.js"></script>
<script>
    initSample();
</script>

<!-- Ajax table -->
<script src="{{ asset('/') }}admin/ajax-table/js/jquery.min.js"></script>
<script src="{{ asset('/') }}admin/ajax-table/js/datatables.min.js"></script>
<script>
    $('#zero_config').DataTable();
</script>

</body>

</html>
