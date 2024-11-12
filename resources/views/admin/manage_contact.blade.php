@extends('admin.layout.main')


@section('main_code')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Manage Contact</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
									if(!empty($contact_arr))
										{
											foreach($contact_arr as $w)
											{
											?>
											<tr>
												<td><?php echo $w->id;?></td>
												<td><?php echo $w->name;?></td>
												<td><?php echo $w->email;?></td>
												<td><?php echo $w->comment;?></td>
												<td>
													<a href="#" class="btn btn-primary">Edit</a>
													<a href="delete_contact/<?php echo $w->id;?>" class="btn btn-danger">Delete</a>
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