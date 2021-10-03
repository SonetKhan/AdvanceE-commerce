@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Update profile</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            
                                @csrf
                            <div class="col-12">

                                <div class="row">

                                    <div class="col-md-6">
                                        
                                           

                                        <div class="form-group">
                                            <h5>User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value={{$editData->name}} required="">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Email Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value={{$editData->email}} class="form-control" required="">

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>File Input Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" id="image" name="profile_photo_path" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <img id="show_image" src="{{!empty($editData->profile_photo_path)? url('upload/admin_images/'.$editData->profile_photo_path) : url('upload/default.jpg')}}" alt="" style="widows: 100px; height:100px;" />

                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                </div>
                    </form>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

   <script type="text/javascript">  

        $(document).ready(function(){

            $('#image').change(function(e){

                var reader = new FileReader();

                reader.onload =function(e){
                $('#show_image').attr('src',e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);

            });

        });

    </script> 

    
</section>

@endsection
