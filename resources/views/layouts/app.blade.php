<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/typicons/typicons.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('js/main.js')}}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('images/fav_icon_rcs.png')}}" />
        <!-- Tambahkan ini di bagian head tampilan Blade Anda -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
    </head>
    <body class="font-sans antialiased">
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper">
                @include('layouts.navigation')
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="row">
                                {{ $slot }}
                            </div>
                            <footer class="footer">
                                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">{{__('Sistem Perhitungan')}} <a href="#" target="_blank">RAB</a> by Narendra Fajar Pamungkas.</span>
                                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('vendors/progressbar.js/progressbar.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('js/off-canvas.js')}}"></script>
        <script src="{{asset('js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('js/template.js')}}"></script>
        <script src="{{asset('js/settings.js')}}"></script>
        <script src="{{asset('js/todolist.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/dashboard.js')}}"></script>
        <script src="{{asset('js/Chart.roundedBarCharts.js')}}"></script>
        <script src="{{asset('js/select2.js')}}"></script>
        <!-- Tambahkan ini di bagian body sebelum akhir tag </body> -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
        <!-- End custom js for this page-->
    </body>
</html>
