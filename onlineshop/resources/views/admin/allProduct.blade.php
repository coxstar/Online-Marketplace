@extends('adminLayout')

@section('adminContent')


<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<p class="alert-success">
							<?php
								$message=Session::get('message');
								if($message)
									{
										echo $message;
										Session::put('message',null);
									}

								
								?>
							</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product ID</th>
								  <th>Product Name</th>
								  <th>Category Name </th>
								  <th>Product Price</th>
                                  <th>Product Image</th>
                                  <th>Product Description</th>
                                  <th>Product color</th>
                                  <th>Publication Status</th>
                                  
							  </tr>
						  </thead>   


					@foreach( $allProductInfo as $vProduct )

						  <tbody>
							<tr>
								<td>{{$vProduct->product_id}}</td>
								<td class="center">{{$vProduct->product_name}}</td>
                                <td class="center">{{$vProduct->category_name}}</td>
                                <td class="center">{{$vProduct->product_price}}</td>
                                <td> <img src="{{URL::to($vProduct->product_image)}}" style="height:80px;width:80px"></td>
                                <td class="center">{{$vProduct->product_description}}</td>
                                <td class="center">{{$vProduct->product_color}}</td>
                                <td class="center">{{$vProduct->publication_status}}</td>
                                
                                

								<td class="center">
								<?php
								
								if($vProduct->publication_status==1)
								{ ?>
								 
									<span class="label label-success">Active</span>
							<?php
								}

								else
								{ 
									?>
									<span class="label label-danger">Inactive</span>
								<?php
								}

								?>
								
								
								</td>

								
								<td class="center">

								<?php
									if($vProduct->publication_status==1)

									{?>
										<a class="btn btn-danger" href="{{URL::to('/inactiveProduct/'.$vProduct->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
										</a>

								<?php	
									}

									else{?>

										<a class="btn btn-success" href="{{URL::to('/activeProduct/'.$vProduct->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
										</a>
								<?php
									}

								?>
									
									<a class="btn btn-info" href="{{URL::to('/editProduct/'.$vProduct->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/deleteProduct/'.$vProduct->product_id)}}"id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
						  </tbody>

					@endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->



@endsection