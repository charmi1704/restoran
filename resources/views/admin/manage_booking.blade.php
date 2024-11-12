@extends('admin.layout.main')


@section('main_code')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Manage Booking</h2>
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
                                    <th>Date & Time</th>
                                    <th>No. of People</th>
                                    <th>Special Request</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
									if(!empty($booking_arr))
										{
											foreach($booking_arr as $w)
											{
											?>
											<tr>
												<td><?php echo $w->id;?></td>
												<td><?php echo $w->name;?></td>
												<td><?php echo $w->email;?></td>
												<td><?php echo $w->date;?></td>
                                                <td><?php echo $w->people;?></td>
												<td><?php echo $w->request;?></td>
												<td>
													<a href="#" class="btn btn-primary">Edit</a>
													<a href="delete?duser=<?php echo $w->id;?>" class="btn btn-danger">Delete</a>
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