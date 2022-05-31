@extends('layouts.app.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <!-- login page start-->
    <div class="container-fluid p-0" style="background-color:#adb5bd">
        <div class="authentication-main">
            <div class="row">
                <div class="col-md-12">
                    <div class="auth-innerright">
                        <div class="authentication-box">
                            <div class="card-body p-0" style="font-family: system-ui !important;">
                                <div class="cont text-left">
                                    <div class="row">
                                        <div class="col text-center">
                                            <img src="{{ asset('assets/images/banner backend.png') }}" height="400px" alt="">
                                        </div>
                                        <div class="col">
                                            <form class="theme-form w-100" action="{{ request()->routeIs('login.index') ? route('login') : route('login.company.index') }}" method="post">
                                                @csrf
                                                <h4 class="f-30 text-center text-success">Login {{ request()->routeIs('login.index') ? __('Admin') : __('Company') }}</h4>
                                                <h6 class="f-16 text-center">Enter your Username and Password</h6>
                                                <div class="form-group">
                                                    <label class="col-form-label pt-0 text-left">Email</label>
                                                    <input class="form-control border border-success" style="border-radius:8px !important" type="text" required name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Password</label>
                                                    <input class="form-control border border-success" style="border-radius:8px !important" type="password" required name="password">
                                                </div>
                                                @if (request()->routeIs('login.company'))
                                                <div class="text-center">
                                                    Already has Account? <a href="https://greenhydrogen.my.id/company-directories" class="text-primary">Sign Up</a>
                                                </div>
                                                @endif
                                                @if (session('error'))
                                                    <div class="form-group">
                                                        <label
                                                            class="col-form-label text-danger">{{ session('error') }}</label>
                                                    </div>
                                                @endif
                                                <div class="form-group form-row mt-3 mb-0">
                                                    <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login page end-->
@endsection

@section('script')
    <script src="{{ url('assets/js/login.js') }}"></script>
@endsection
