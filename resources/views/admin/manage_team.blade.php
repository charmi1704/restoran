@extends('admin.layout.main')


@section('main_code')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Manage Team</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>Table  Sample One</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
									if(!empty($team_arr))
										{
											foreach($team_arr as $w)
											{
											?>
											<tr>
												<td><?php echo $w->id;?></td>
												<td><?php echo $w->name;?></td>
                                                <td><img src="admin/assets/img/team/<?php echo $w->img;?>" width="50px"></td>
												<td><?php echo $w->designation;?></td>
												<td>
													<a href="#" class="btn btn-primary">Edit</a>
													<a href="delete_team/<?php echo $w->id;?>" class="btn btn-danger">Delete</a>
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