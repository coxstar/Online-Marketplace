@extends('layout')

@section('content')


  <!-- ============================================================= details main body start from here ==========================================================  -->
<br>
  <section>
      <div class="container">
          <div class="row">
              <div class="col-md-offset-1 col-lg-4 col-sm-4">
                <img src="{{URL::to($productDetails->product_image)}}" alt="" class="" style="height:375px;width:475px;" >
              </div>

              <div class="col-md-offset-1 col-lg-2 col-sm-2">
                    
                  </div>

              <div class="col-md-offset-1 col-lg-6 col-sm-6">
                <h4 style="font-weight: 600;">
                    Product Name: {{$productDetails->product_name}}
                </h4>
                <h5>
                    Product ID:{{$productDetails->product_id}}
                </h5>

                <h5 style="color:red;">
                    Price: {{$productDetails->product_price}}TK
                </h5>

                <h6>Quick Overview:</h6>
                <p>
                        A paragraph is a self-contained unit of a discourse in writing dealing with a particular point or idea. 
                        A paragraph consists of one or more sentences. Though not required by the syntax of any language, paragraphs are usually 
                        an expected part of formal writing, used to organize longer prose.
                </p>

                <span>
                  <form action="{{url('/addCart')}}" method="POST">
                  {{ csrf_field() }}
                    <label>Quantity:</label>
                    <input name="qty" type="text" value="1" />
                    <input type="hidden" name="productId" value="{{$productDetails->product_id}}" />
                    <button type="submit"  class="btn btn-success">
                      <i class="fa fa-shopping-cart"></i>
                      Add to Cart
                      </button>
                  </form>
                </span>

                <!-- <a class="btn btn-success" href="#" role="button">Add to Cart</a> -->
                  <br>
                <a class="btn btn-success" href="#" role="button">Add to Wishlist</a>


                </div>
          </div>


          <br><br>

                    <div class="row">
                            <div class="col-md-offset-1 col-lg-3 col-sm-3">
                              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Specification</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Description</a>
                              </div>
                            </div>


                            <div class="col-md-offset-1 col-lg-1 col-sm-1">

                            </div>

                            <div class="col-md-offset-1 col-lg-8 col-sm-8">
                              <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        A paragraph is a self-contained unit of a discourse in writing dealing with a particular point or idea. 
                                        A paragraph consists of one or more sentences. Though not required by the syntax of any language, paragraphs are usually 
                                        an expected part of formal writing, used to organize longer prose.
                                </div>



                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    A paragraph is a self-contained unit of a discourse in writing dealing with a particular point or idea. 
                                        A paragraph consists of one or more sentences. Though not required by the syntax of any language, paragraphs are usually 
                                        an expected part of formal writing, used to organize longer prose.</div>
                              </div>
                            </div>
                          </div>
      </div>
  </section>

  <br>


  <!-- ============================================================= details main body end from here ==========================================================  -->


  @endsection


