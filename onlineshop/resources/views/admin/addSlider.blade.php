@extends('adminLayout')

@section('adminContent')



<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Product</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">

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

					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
		
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/saveSlider')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
						  <fieldset>


                            <div class="control-group">
								<label class="control-label" for="fileInput">Upload Image</label>
								<div class="controls">
								  <input type="file" name="slider_image">
								</div>
							  </div>
							

                            <div class="control-group">
							  <label class="control-label" for="date01">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" class="input-xlarge" name="publicationStatus" value = "1">
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Slider</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



@endsection
