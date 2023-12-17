<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
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
        
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('images/fav_icon_rcs.png')}}" />
        <!-- Tambahkan ini di bagian head tampilan Blade Anda -->
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
                                  <span class="text-center text-sm-left d-block d-sm-inline-block"> <b>{{__('Sistem Perhitungan RAB by ')}}</b> <a href="https://portofolio.rndweb.my.id" target="_blank">{{__('Narendra Fajar Pamungkas, A.Md,Kom')}}</a></span>
                                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('js/hoverable-collapse.js')}}"></script>

        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{asset('js/dashboard.js')}}"></script>
        <script src="{{asset('js/rcs-main.js')}}"></script>
        <!-- Tambahkan ini di bagian body sebelum akhir tag </body> -->
        <!-- End custom js for this page-->
        @yield('additional_js')
    </body>
</html>
