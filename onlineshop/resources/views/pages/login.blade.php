@extends('layout')

@section('content')

<br>


<!-- ===================================================login main body start here ================================================== -->

  <section>
      <div class="container">

        <div class="row">
            <div class="col-md-offset-1 col-md-12 col-sm-12">
                <h4 class="login-head">User Login or Create an Account</h4>
            </div>
        </div>

        <br>

       

    <div class="row" style="margin-bottom: 0.5rem;">
        <div class="col-md-offset-1 col-md-5 col-sm-5" style="border:1px solid black">

            <h4 style="text-align: center;">Create An Account</h4>

            <form action="{{url('/customerRegistration')}}"  method="post">
            {{csrf_field()}}


                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="Username" class="form-control" id="username" name="customerName" aria-describedby="usernameHelp" placeholder="Enter Username">
                        
                </div>


                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="customerEmail" aria-describedby="emailHelp" placeholder="Enter email">
                </div>


                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="customerPassword" placeholder="Password">
                </div>


                <div class="form-group">
                    <label for="mobileNumber">Mobile Number</label>
                    <input type="customerMobileNumber" class="form-control" id="customerMobileNumber" name="customerMobileNumber" placeholder="Mobile Number">
                </div>

                <a class="forgetpass-link" style="font-size:12px;" href="#">Forgot Your Password?</a>

                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                <button type="submit" class="btn btn-success" style="margin:2rem;float:right;" >SIGNIN</button>
            </form>

    </div>


              <div class="col-md-offset-1 col-md-1 col-sm-1">
                    
                  </div>


                <div class="col-md-offset-1 col-md-6 col-sm-6" style="border:1px solid rgb(8, 6, 44)">
                    <h6 class="login-head">Login Here</h6>
                    <p class="text-muted"style="font-size:15px;text-align: justify; margin-left:0.5rem;">
                        If you have an account with us, please log in.
                    </p>

                    <form action="{{url('/customerLogin')}}" method="post">
                    {{csrf_field()}}
                            <div class="form-group">
                              <label for="exampleInputEmail1" >Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" name="customerEmail" aria-describedby="emailHelp" placeholder="Enter email">
                              <!-- <small id="emailHelp" class="form-text text-muted">Recuired</small> -->
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="customerPassword" placeholder="Password">
                            </div>

                            <a class="forgetpass-link" style="font-size:12px;" href="page_not_found.html">Forgot Your Password?</a>
                            
                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                            <button type="submit" class="btn btn-success" style="margin:2rem;float:right;" >LOGIN</button>
                          </form>


                </div>
          </div>
      </div>
  </section>


  
<!-- ===================================================login main body end here ================================================== -->

<br>


 



@endsection