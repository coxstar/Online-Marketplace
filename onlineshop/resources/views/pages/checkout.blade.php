@extends('layout')

@section('content')


<br>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-lg-3 col-sm-3">
				
            </div>
            <div class="col-md-offset-1 col-lg-6 col-sm-6">
				<h4 style="font-weight:600;text-align:center;">Shipping Details</h4>


                <form action="{{url('/saveShippingDetails')}}" method="POST">
				{{csrf_field()}}
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail1" name="shippingEmail" aria-describedby="emailHelp" placeholder="Shipping Email">
                    </div>

                    <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="shippingFirstName" aria-describedby="emailHelp" placeholder="Shipping First Name">
                          </div>
					
					<div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="shippingLastName" aria-describedby="emailHelp" placeholder="Shipping Last Name">
                    </div>

					<div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="shippingMobileNumber" aria-describedby="emailHelp" placeholder="Shipping Mobile Number">
                    </div>
				
					<div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="shippingAddress" aria-describedby="emailHelp" placeholder="Shipping Address">
                    </div>

					<div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="shippingCity" aria-describedby="emailHelp" placeholder="Shipping City">
                    </div>


                                  

                    <button type="submit" class="btn btn-primary">Submit</button>


                  </form>
            </div>
        </div>
    </div>
</section>

<br>
<br>


@endsection