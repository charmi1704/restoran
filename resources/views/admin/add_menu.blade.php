@extends('admin.layout.main')


@section('main_code')

<!--include javascript file -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Menu</h2>

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

                                <form action="{{url('/insert_menu')}}" role="form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Item Name</label>
                                        <input class="form-control" value="{{old('name')}}" placeholder="Please Enter Item Name" name="name" />
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Item Image</label>
                                        <input type="file" class="form-control" value="{{old('img')}}" name="img"  />
                                        @error('img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Item Price</label>
                                        <input type="number" class="form-control" value="{{old('price')}}" placeholder="Please Enter Price" name="price"  />
                                        @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input class="form-control" value="{{old('description')}}" placeholder="Please Enter Description" name="description"  />
                                        @error('description')
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