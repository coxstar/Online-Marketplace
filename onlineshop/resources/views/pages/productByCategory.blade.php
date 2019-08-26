
@extends('layout')

@section('content')


  <!-- ============================================================= category main body start from here ==========================================================  -->
<br>
  <section>
      <div class="container">
            <div class="row">
            <?php foreach($productByCategory as $vproductByCategory){?>


              <div class="col-md-offset-1 col-md-2 col-sm-2">
                      <div  class="product_one_sale_top">
                        <div class="text-center">
                            <img src="{{URL::to($vproductByCategory->product_image)}}" alt="prodcut on sale image" class="img-thumbnail" style="margin-top:1rem;">
                        </div>
                      
                  
                        </div>
                  
                        <div class="product_one_sale_bottom">
                          
                  
                        <form action="{{url('/addCart')}}" method="post">
                        {{ csrf_field() }}

                          <button type="button" class="btn btn-secondary" title="Quick Shop">
                            <i class="fa fa-eye"></i>
                          </button>
                          <button type="button" class="btn btn-secondary" title="Add to Wish-list">
                            <i class="far fa-heart"></i>
                            </button>
                            <input name="qty" type="hidden" value="1" />
                            <input type="hidden" name="productId" value="{{$vproductByCategory->product_id}}" />
                          <button type="submit" class="btn btn-secondary" title="Add to Cart">
                              <i class="fa fa-shopping-cart"></i>
                            </button>
                          </form>
                  
                            <a href="{{URL::to('/productDetails/'.$vproductByCategory->product_id)}}"><h5 class="product_name">{{$vproductByCategory->product_name}}</h5></a>
                            
                            <h6 class="price_tag">{{$vproductByCategory->product_price}}TK</h6>
                        </div>
                    </div>

                    <?php }?>

                </div>


              <br>
            


              <div class="row">

                  <div class="col-md-offset-1 col-md-4 col-sm-4">

                  </div>
                  <div class="col-md-offset-1 col-md-5 col-sm-5">
                          <nav aria-label="Page navigation example" >
                                  <ul class="pagination">
                                    <li class="page-item">
                                      <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                      </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                                    <li class="page-item"><a class="page-link" href="#">9</a></li>
                                    <li class="page-item"><a class="page-link" href="#">10</a></li>

                                    <li class="page-item">
                                      <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                      </a>
                                    </li>
                                  </ul>
                                </nav>
                  </div>

                  <div class="col-md-offset-1 col-md-3 col-sm-3">

                      </div>


              </div>

        </div>
  </section>
                                            



  <!-- ============================================================= category main body end from here ==========================================================  -->

  @endsection