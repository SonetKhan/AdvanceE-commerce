@extends('frontend.main_master')
@section('content')
<div class="sign-in-page">
    <div class="row">
        <!-- Sign-in -->
        <div class="col-md-6 col-sm-6 sign-in">
            <h4 class="">Forgot Password ? Dont worry provide your email here</h4>
            
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
                </div>
                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
            </form>
        </div>
    </div>
        <!-- Sign-in -->

        <!-- create a new account -->
        
@endsection
