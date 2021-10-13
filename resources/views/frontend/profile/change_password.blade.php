@extends('frontend.main_master')
@section('content')
<div class="container">
    <form action="{{route('update.password')}}" method="POST">
        <div class="row">
            @csrf
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Current Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="current_password" type="password" name="current_password"
                                    class="form-control" value="">
                                @error('current_password')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Change Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="password" type="password" name="password" value="" class="form-control">
                                @error('password')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="password_confirmation" type="password" name="password_confirmation" value=""
                                    class="form-control">
                                @error('password_confirmation')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                </div>
    </form>
</div>


@endsection
