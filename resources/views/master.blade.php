<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                    <meta content="" name="description">
                        <meta content="" name="author">
                            <title>
                                @yield('title')
                            </title>
                            <!-- Bootstrap core CSS-->
                            <link href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
                                <link href="{{ asset('public/css/bootstrap-datepicker.css')}}" rel="stylesheet">
                                    <link href="{{ asset('public/css/bootstrap-datepicker.css')}}" rel="stylesheet">
                                        <script src="{{ asset('public/js/jquery.min.1.9.js')}}" type="text/javascript">
                                        </script>
                                        <script src="{{ asset('public/js/bootstrap-datepicker.js')}}" type="text/javascript">
                                        </script>
                                        <link href="{{ asset('public/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
                                            <!-- Custom styles for this template-->
                                            <link href="{{ asset('public/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
                                                <!-- Custom styles for this template-->
                                                <link href="{{ asset('public/css/sb-admin.css')}}" rel="stylesheet">
                                                </link>
                                            </link>
                                        </link>
                                    </link>
                                </link>
                            </link>
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
                            <link href="{{ asset('public/css/app.css')}}" rel="stylesheet">
                            <!-- Latest compiled and minified JavaScript -->
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        @include('includes.menu')
        <!-- //header-bot -->
        <!-- banner -->
        <!-- //banner-top -->
        <!-- banner -->
        <div class="content-wrapper" id="main">
            <div class="container-fluid">
                <div id="content-header">
                    <h1 align="center" class="alert-warning">
                        @yield('title')
                    </h1>
                    <div class="container-fluid">
                        <div class="row-fluid">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>
                        </small>
                    </div>
                </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up">
                </i>
            </a>
            {{-- //logout modal --}}
            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="logout" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Ready to Leave?
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                Cancel
                            </button>
                            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('public/vendor/jquery/jquery.min.js')}}">
        </script>
        <script src="{{ asset('public/js/bootstrap.min.js')}}">
        </script>
        <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}">
        </script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('public/vendor/jquery-easing/jquery.easing.min.js')}}">
        </script>
        <script src="{{ asset('public/vendor/chart.js/Chart.min.js')}}">
        </script>
        <script src="{{ asset('public/vendor/datatables/jquery.dataTables.js')}}">
        </script>
        <script src="{{ asset('public/vendor/datatables/dataTables.bootstrap4.js')}}">
        </script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('public/js/sb-admin.min.js')}}">
        </script>
        <!-- Custom scripts for this page-->
        <script src="{{ asset('public/js/sb-admin-datatables.min.js')}}">
        </script>
        <script src="{{ asset('public/js/sb-admin-charts.min.js')}}">
        </script>
    </body>
</html>
