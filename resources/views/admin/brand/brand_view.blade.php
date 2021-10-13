@extends('admin.admin_master')
@section('content')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Brand List </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand EN</th>
                                        <th>Brand Hin</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $item)
                                    <tr>
                                        <td>{{$item->brand_name_en}}</td>
                                        <td>{{$item->brand_name_hin}}</td>
                                        <td><img src="{{asset($item->brand_image)}}" alt=""
                                                style="width:70px; height:40px;"></td>
                                        <td>
                                            <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('brand.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
            {{-- -----------Add Brand----------- --}}
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brand+</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="table-responsive">

                            <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Brand Name English</label>
                                    <input class="form-control" type="text" name="brand_name_en">
                                    @error('brand_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Brand Name Hindi</label>
                                    <input class="form-control" type="text" name="brand_name_hin">
                                    @error('brand_name_hin')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Brand Image</label>
                                    <input class="form-control" type="file" name="brand_image">
                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    
                                    <input type="submit" value="Add Brand" class="btn btn-success" style="border-radius:25%">
                                </div>
                               
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
@endsection
