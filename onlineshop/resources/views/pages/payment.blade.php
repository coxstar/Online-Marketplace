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
									<form action="" method="">
                                    {{ csrf_field() }}
									
									{{$vcartContents->qty}}
									
                                    </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$vcartContents->total}} TK</p>
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
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<br>
	<br>
	<br>

	<section>
		<div  class="container">
      <div class="row">
        <div class="col-md-offset-1 col-lg-4 col-sm-4">
			<h5>Select Payment Method:</h5>
		</div>
		<div class="col-md-offset-1 col-lg-2 col-sm-2">
            <form action="{{url('/placeOrder')}}" method="post">
			{{csrf_field()}}

			<input type="radio" name="paymentMethod" value ="handcash">Hand Cash <br>
			<input type="radio" name="paymentMethod" value ="paypal">Paypal <br>
			<input type="radio" name="paymentMethod" value ="bikash">bikash <br><br>
			<input type="submit" name="" value ="done"><br>

        </div>
      </div>
    </div>
	</section>

	<br>
	<br>
	

@endsection