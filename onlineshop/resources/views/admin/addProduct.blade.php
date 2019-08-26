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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
		
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/saveProduct')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Name </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="productName" required="" >
							  </div>
							</div>

                            <div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="categoryId">
                                    <option>Select Category</option>
                                  <?php 
                                    $allPublishCategory = DB::table('tbl_category')
                                            ->where('publication_status',1)
                                            ->get();
                                
                                foreach($allPublishCategory as $vCategory){ ?>

									<option value="{{$vCategory->category_id}}">{{$vCategory->category_name}}</option>
                                <?php }?>
								  </select>
								</div>
							  </div>


                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product Price </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="productPrice" required="" >
							  </div>
							</div>


                            <div class="control-group">
								<label class="control-label" for="fileInput">Upload Image</label>
								<div class="controls">
								  <input type="file" name="productImage">
								</div>
							  </div>


                              <div class="control-group">
							  <label class="control-label" for="typeahead">Product color </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="productColor" required="" >
							  </div>
							</div>



							<div class="control-group">
							  <label class="control-label" for="date01">Product Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="productDescription" row="3"required=""></textarea>
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="date01">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" class="input-xlarge" name="publicationStatus" value = "1">
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



@endsection
