@extends('admin.layout.main')


@section('main_code')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Manage User</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
									if(!empty($user_arr))
										{
											foreach($user_arr as $w)
											{
											?>
											<tr>
												<td><?php echo $w->id;?></td>
												<td><?php echo $w->name;?></td>
												<td><img src="website/img/users/<?php echo $w->img;?>" width="50px"></td>
												<td><?php echo $w->email;?></td>
												<td><?php echo $w->password;?></td>
												<td><?php echo $w->mobile;?></td>
												<td><?php echo $w->status;?></td>

												<td>
													<a href="#" class="btn btn-primary">Edit</a>
													<a href="delete_user/<?php echo $w->id;?>" class="btn btn-danger">Delete</a>
												</td>
											</tr>
											<?php
											}
										}
                                        else
										{	
                                        ?>
										<tr>
											<td align="center" colspan="8"> Data Not Found </td>
										</tr>
										<?php
										}
										?>
                                
                            </tbody>
                        </table>

                    </div>
</div>
</div>
                </div>
                @endsection
                <!-- /. ROW  -->