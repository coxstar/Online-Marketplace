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
								  <th>Slider ID</th>
								  
                                  <th>Slider Image</th>
                                  
                                  <th>Publication Status</th>
                                  
							  </tr>
						  </thead>   


					@foreach( $allSliderInfo as $vSlider )

						  <tbody>
							<tr>
								<td>{{$vSlider->slider_id}}</td>
								
                                <td> <img src="{{URL::to($vSlider->slider_image)}}" style="height:80px;width:80px"></td>
                                
                                <td class="center">{{$vSlider->publication_status}}</td>
                                
                                

								<td class="center">
								<?php
								
								if($vSlider->publication_status==1)
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
									if($vSlider->publication_status==1)

									{?>
										<a class="btn btn-danger" href="{{URL::to('/inactiveSlider/'.$vSlider->slider_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
										</a>

								<?php	
									}

									else{?>

										<a class="btn btn-success" href="{{URL::to('/activeSlider/'.$vSlider->slider_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
										</a>
								<?php
									}

								?>
									
									
									<a class="btn btn-danger" href="{{URL::to('/deleteSlider/'.$vSlider->slider_id)}}"id="delete">
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