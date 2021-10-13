@extends('admin.admin_master')

@section('content')
<div class="col-12">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Brand</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="table-responsive">

                <form method="POST" action="{{route('brand.update',$editData->id)}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$editData->id}}">
                    <input type="hidden" name="old_image" value="{{$editData->brand_image}}">
                    <div class="form-group">
                        <label>Brand Name English</label>
                        <input class="form-control" type="text" name="brand_name_en" value="{{$editData->brand_name_en}}">
                        @error('brand_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Brand Name Hindi</label>
                        <input class="form-control" type="text" name="brand_name_hin" value="{{$editData->brand_name_hin}}">
                        @error('brand_name_hin')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Brand Image</label>
                        <input class="form-control" type="file" name="brand_image">
                        <img src="{{asset($editData->brand_image)}}" alt="" style="height:70px; width:70px">
                        @error('brand_image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        
                        <input type="submit" value="Update Brand" class="btn btn-success" style="border-radius:25%">
                    </div>
                   
                </form>
            </div>
        </div>

@endsection