@extends('admin.layout.main')


@section('main_code')

<!--include javascript file -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Team</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                <form role="form" action="{{url('/insert_team')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" value="{{old('name')}}" placeholder="Please Enter Name" name="name" />
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" value="{{old('img')}}" class="form-control" name="img" />
                                        @error('img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input class="form-control" value="{{old('designation')}}" placeholder="Please Enter Designation" name="designation" />
                                        @error('designation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <button type="submit" class="btn btn-default" name="submit">Submit</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>

                                </form>


                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
                @endsection