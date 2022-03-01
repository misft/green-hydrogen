@extends('layouts.app.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="authentication-main">
            <div class="row">
                <div class="col-md-12">
                    <div class="auth-innerright">
                        <div class="authentication-box">
                            <div class="card-body p-0">
                                <div class="cont text-center">
                                    <div class="w-100">
                                        <form class="theme-form w-100" action="{{ route('login') }}" method="post">
                                            @csrf
                                            <h4>LOGIN</h4>
                                            <h6>Enter your Username and Password</h6>
                                            <div class="form-group">
                                                <label class="col-form-label pt-0">Email</label>
                                                <input class="form-control" type="text" required name="email">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Password</label>
                                                <input class="form-control" type="password" required name="password">
                                            </div>
                                            <div class="checkbox p-0">
                                                <input id="checkbox1" type="checkbox" name="remember">
                                                <label for="checkbox1">Remember me</label>
                                            </div>
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
    <!-- login page end-->
@endsection

@section('script')
    <script src="{{ asset('assets/js/login.js') }}"></script>
@endsection
