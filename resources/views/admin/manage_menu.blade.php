@extends('admin.layout.main')


@section('main_code')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Manage Menu</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Item Name</th>
                                    <th>Item Image</th>
                                    <th>Item Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
									if(!empty($menu_arr))
										{
											foreach($menu_arr as $w)
											{
											?>
											<tr>
												<td><?php echo $w->id;?></td>
												<td><?php echo $w->name;?></td>
												<td><img src="admin/assets/img/menu/<?php echo $w->img;?>" width="50px"></td>
												<td><?php echo $w->price;?></td>
												<td><?php echo $w->description;?></td>
												<td>
													<a href="#" class="btn btn-primary">Edit</a>
													<a href="delete_menu/<?php echo $w->id;?>" class="btn btn-danger">Delete</a>
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