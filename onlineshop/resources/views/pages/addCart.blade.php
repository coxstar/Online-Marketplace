@extends('layout')

@section('content')


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">/Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">

            <?php 

                $cartContent = Cart::content();

                
            
            ?>

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="name">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>

                    @foreach($cartContent as $vcartContents)
						<tr>
							<td class="cart_product">
								<img src="{{$vcartContents->options->image}}"  alt="" style="height:80px;weidth:80px;">
							</td>
							<td class="cart_description">
								<h4>{{$vcartContents->name}}</h4>
								<p>Product ID: {{$vcartContents->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{$vcartContents->price}} TK</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/updateCart')}}" method="post">
                                    {{ csrf_field() }}

									<input class="cart_quantity_input" type="text" name="qty" value="{{$vcartContents->qty}}" autocomplete="off" size="2">

                                    <input type="hidden" name="rowId" value="{{$vcartContents->rowId}}">

									<button type="submit" name="submit" class="btn btn-sm btn-success">Update </button>
                                    </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$vcartContents->total}} TK</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('deleteCart/'.$vcartContents->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}} TK</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							
							
							<?php
								$customerId=Session::get('customer_id');
								$shippingId=Session::get('shipping_id');
								
								?>

								<?php
									if($customerId !=NULL && $shippingId ==NULL)
									{
								?> 
									<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>

								<?php }elseif($customerId !=NULL && $shippingId !=NULL)
								
								{?>

									<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Check Out</a>

								<?php } else 
								{?>
									<a class="btn btn-default check_out" href="{{URL::to('/loginCheck')}}">Check Out</a>

								<?php }?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


	<br>
	<br>
	<br>
	

@endsection