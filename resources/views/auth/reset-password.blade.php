@extends('frontend.main_master')
@section('content')
<div class="sign-in-page">
    <div class="row">
        <!-- Sign-in -->
        <div class="col-md-6 col-sm-6 sign-in">
            <h4 class="">Forgot Password ? Dont worry provide your email here.After that check your email</h4>
            
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
                </div>
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
                </div>
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
                </div>
                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
            </form>
        </div>
    </div>
        <!-- Sign-in -->

        <!-- create a new account -->
        
@endsection
