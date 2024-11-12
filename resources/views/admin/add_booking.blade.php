@extends('admin.layout.main')


@section('main_code')

 <!--include javascript file -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Add Booking</h2>   
                       
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
                                    
                                    <form role="form" method="POST" enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Please Enter Name" name="name" required/>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" placeholder="Please Enter email" name="email" required/>
                                        </div>

                                        <div class="form-group">
                                            <label>Date & Time</label>
                                            <input class="form-control" type="datetime-local" placeholder="Please Enter Date & Time" name="date" required/>
                                        </div>

                                        <div class="form-group">
                                            <label>No. of People</label>
                                            <select class="form-select" id="select1">
                                          <option value="1">People 1</option>
                                          <option value="2">People 2</option>
                                          <option value="3">People 3</option>
                                        </select>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Special Request</label>
                                            <input class="form-control" placeholder="Please Enter Request"  name="request" required/>
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
                 