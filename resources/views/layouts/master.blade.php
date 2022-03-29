<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content=""
        content="">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ route('/') }}/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ route('/') }}/assets/images/favicon.png" type="image/x-icon">
    <title>@yield('title')</title>
    @include('layouts.css')
    @yield('style')
    @stack('style')

</head>

<body class="button-builder">
    <!-- Loader starts-->
    {{-- <div class="loader-wrapper">
        <div class="typewriter">
            <h1>New Era Admin Loading..</h1>
        </div>
    </div> --}}
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <!-- Page Header Start-->
        @include('layouts.header')
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('layouts.sidebar')
            <!-- Page Sidebar Ends-->
            <!-- Right sidebar Start-->
            @include('layouts.chat_sidebar')
            <!-- Right sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6 main-header">
                                @yield('breadcrumb-title')
                                <h6 class="mb-0">admin panel</h6>
                            </div>
                            <div class="col-lg-6 breadcrumb-right">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('/') }}"><i
                                                class="pe-7s-home"></i></a></li>
                                    @yield('breadcrumb-items')
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    @if(session('success') || session('danger'))
                    <x-card.page-notification/>
                    @endif
                </div>
                @yield('content')
                <div class="welcome-popup modal fade" id="loadModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="modal-header"></div>
                                <div class="contain p-30">
                                    <div class="text-center">
                                        <h3>Green Hydrogen</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer start-->
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.script')
    
    @stack('script')
</body>

</html>
