@extends('layout')

@section('content')


<!-- ====================================================== my market menu , slide and recent update section start here ================================ -->




<section>
  <div class="container"> <br>
    <div class="row_one">
    <div class="row" >


<!-- =============================================================== my store start here =========================================== -->

        <div  class="col-md-offset-1 col-lg-2 col-sm-2" style="margin-top:1.5rem; margin-bottom:.5rem;">
            
          <h5 class="category_list" style="color:#2d82d1" > <i class="fas fa-store-alt" style="color:#d1452d"></i> MY STORE </h5><br>
            <ul class="list-group list-group-flush">

                <!-- categroy name inserted here -->
              
              <?php 
                  $allPublishCategory = DB::table('tbl_category')
                        ->where('publication_status',1)
                        ->get();
              
              foreach($allPublishCategory as $vCategory){ ?>

              

                <li class="list-group-item">
                  <a class="nav-link2" href="{{URL::to('/productByCategory/'.$vCategory->category_id)}}">{{$vCategory->category_name}}</a>    
                </li>
              <?php } ?>
                
                <li class="list-group-item"><a class="nav-link2" href="#">All Category</a></li>
              </ul>
        </div>

<!-- ============================================================== my store end here ============================================== -->



<!--  ===========================================================carousel start here ================================================ -->

        <div class="col"style="margin-top:1.5rem; margin-bottom:1.5rem;">          
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                
                 <?php 
                  $allSliderInfo = DB::table('tbl_slider')
                  ->where('publication_status',1)
                  ->get();
                  ?>
                 
                  @foreach ($allSliderInfo as $vSlider)
                
                  <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}"></li>

                  @endforeach
                </ol>

                
                <div class="carousel-inner">
                
                 
                @foreach ($allSliderInfo as $vSlider)
                  <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                    <img src="{{URL::to($vSlider -> slider_image)}}" class="d-block w-100" alt="...">
                  </div>

                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>

<!-- ======================================================== carousel end here ============================================ -->



<!-- ====================================================== recent update section start here =========================================== -->

        <div  class="col-md-offset-1 col-lg-3 col-sm-3"style="margin-top:1.5rem; margin-bottom:.5rem;">
            <h5 class="letest_update"></i>Recent Update</h5> <br>
            <ul class="list-group list-group-flush">
                
              <li class="list-group-item">
                  <a href="#">
                    <img src="images/jb1.jpg" alt="brand image" class="img-thumbnail">
                  </a>
              
                </li>
                <li class="list-group-item">
                  <a href="#">
                    <img src="images/kb2.jpg" alt="brand image" class="img-thumbnail">
                  </a>
        
                </li>


                <!-- <li class="list-group-item"><img src="images/1c.png" alt="brand image" class="img-thumbnail"></li> -->
                <!-- <li class="list-group-item"><img src="images/1a.jpg" alt="brand image" class="img-thumbnail"></li> -->
                <!-- <li class="list-group-item"><a class="nav-link2" href="#">All Category</a></li> -->
              
              </ul>
        </div>

<!-- ==================================================== recetn update section end here =============================================== -->



        </div>
      </div>
    </div>
</section><br>




<!-- ============================================== my market menu , slide and recent update section end here============================================ -->




<!-- =================================================== populer item section start here================================================================= -->


<section>


  <!-- =================================================== on sale heading start here ============================================= -->


  <div class="container">
    <div class="row_two">
      <div class="row">
       <div class="col-md-offset-1 col-md-12 col-sm-12">
          <h6 class="section_head">
            ON SALE
          </h6>
       </div>
      </div>
    </div>

    <!-- =============================================== one sale heading end here ======================================== -->
    
    <div class="row">


  <!-- ============================================= on sale 1st product is here ======================================== -->

<?php 
  $onSaleProduct = DB::table('tbl_products')
  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
  ->select('tbl_products.*','tbl_category.category_name')
  ->where ('tbl_products.publication_status',1)
  ->limit(6)
  ->get();

  foreach($onSaleProduct as $vOnsale)
  {

?>

  <div class="col-md-offset-1 col-md-2 col-sm-2">
    <div  class="product_one_sale_top">
      <div class="text-center">
          <img src="{{URL::to($vOnsale -> product_image)}}" alt="prodcut on sale image" class="img-thumbnail" style="margin-top:1rem;">
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
            <input type="hidden" name="productId" value="{{$vOnsale->product_id}}" />
          <button type="submit" class="btn btn-secondary" title="Add to Cart">
              <i class="fa fa-shopping-cart"></i>
            </button>
          </form>

          <a href="{{URL::to('/productDetails/'.$vOnsale->product_id)}}"><h5 class="product_name">{{$vOnsale -> product_name}}</h5></a>
          <h6 class="price_tag">{{$vOnsale -> product_price}} TK</h6>
      </div>
    </div>  
  </div>

  <?php }?>

</div>
</section> <br>



<!-- ============================================================== One Sale item section end here ================================================ -->







<!-- =============================================================== Jewelry section start here============================================= -->


<section>


  <!-- =================================================== jewelry heading start here ============================================= -->


  <div class="container">
    <!-- <div class="row_two"> -->
      <div class="row">
       <div class="col-md-offset-1 col-lg-2 col-sm-2" style="/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#bf6e4e+0,347099+40,4b8e77+60,bf6e4e+100 */
                                                                background: rgb(191,110,78); /* Old browsers */
                                                                background: -moz-linear-gradient(-45deg,  rgba(191,110,78,1) 0%, rgba(52,112,153,1) 40%, rgba(75,142,119,1) 60%, rgba(191,110,78,1) 100%); /* FF3.6-15 */
                                                                background: -webkit-linear-gradient(-45deg,  rgba(191,110,78,1) 0%,rgba(52,112,153,1) 40%,rgba(75,142,119,1) 60%,rgba(191,110,78,1) 100%); /* Chrome10-25,Safari5.1-6 */
                                                                background: linear-gradient(135deg,  rgba(191,110,78,1) 0%,rgba(52,112,153,1) 40%,rgba(75,142,119,1) 60%,rgba(191,110,78,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                                                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bf6e4e', endColorstr='#bf6e4e',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */">
          <h6 class="section_head3">
            Jewelry
          </h6>
       </div>
       <div class="col-md-offset-1 col-lg-10 col-sm-10">
        <div class="row_three">
          <h6 class="section_divider">
            
          </h6>
        </div>
     </div>
      </div>
    <!-- </div> -->

    <!-- =============================================== jewelry  heading end here ======================================== -->
    
    <div class="row_background">
      <div class="row">

  <!-- ============================================= jewelry  1st product is here ======================================== -->


  <?php 
    $jewelryProduct = DB::table('tbl_products')
    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    ->select('tbl_products.*','tbl_category.category_name')
    ->where ('tbl_products.publication_status',1)
    ->where('tbl_products.category_id',6)
    ->limit(6)
    ->get();

foreach($jewelryProduct as $vJewelry)
{

?>




  <div class="col-md-offset-1 col-md-2 col-sm-2">
    <div  class="product_one_sale_top">
      <div class="text-center">
          <img src="{{URL::to($vJewelry -> product_image)}}" alt="prodcut on sale image" class="img-thumbnail" style="margin-top:1rem;">
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
            <input type="hidden" name="productId" value="{{$vJewelry->product_id}}" />
          <button type="submit" class="btn btn-secondary" title="Add to Cart">
              <i class="fa fa-shopping-cart"></i>
            </button>
          </form>

          <a href="{{URL::to('/productDetails/'.$vJewelry->product_id)}}"><h5 class="product_name">{{$vJewelry -> product_name}}</h5></a>
          
          <h6 class="price_tag">{{$vJewelry -> product_price}} TK</h6>
      </div>
  </div>


  <?php }?>

  </div>
</div>

  </div>
</section><br>



<!-- ==================================================================== Jewelry section end here ===================================================== -->





<!-- ==================================================================== Men's Fashion start here ===================================================== -->


<section>


  <!-- =================================================== Men's Fashion heading start here ============================================= -->


  <div class="container">
    <!-- <div class="row_two"> -->
      <div class="row">
       <div class="col-md-offset-1 col-md-3 col-sm-3" style="/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#bf6e4e+0,347099+40,4b8e77+60,bf6e4e+100 */
                                                                background: rgb(191,110,78); /* Old browsers */
                                                                background: -moz-linear-gradient(-45deg,  rgba(191,110,78,1) 0%, rgba(52,112,153,1) 40%, rgba(75,142,119,1) 60%, rgba(191,110,78,1) 100%); /* FF3.6-15 */
                                                                background: -webkit-linear-gradient(-45deg,  rgba(191,110,78,1) 0%,rgba(52,112,153,1) 40%,rgba(75,142,119,1) 60%,rgba(191,110,78,1) 100%); /* Chrome10-25,Safari5.1-6 */
                                                                background: linear-gradient(135deg,  rgba(191,110,78,1) 0%,rgba(52,112,153,1) 40%,rgba(75,142,119,1) 60%,rgba(191,110,78,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                                                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bf6e4e', endColorstr='#bf6e4e',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */">
          <h6 class="section_head3">
            Men's Fashion
          </h6>
       </div>
       <div class="col-md-offset-1 col-md-9 col-sm-9">
        <div class="row_three">
          <h6 class="section_divider">
            
          </h6>
        </div>
     </div>
      </div>
    <!-- </div> -->

    <!-- =============================================== Men's Fashion  heading end here ======================================== -->
    
    
    <div class="mensfashtion_background">
      <div class="row">

  <!-- ============================================= Men's Fashion  1st product is here ======================================== -->

  <?php 
    $menFashionProduct = DB::table('tbl_products')
    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    ->select('tbl_products.*','tbl_category.category_name')
    ->where ('tbl_products.publication_status',1)
    ->where('tbl_products.category_id',1)
    ->limit(6)
    ->get();

foreach($menFashionProduct as $vMenFashion)
{

?>


  <div class="col-md-offset-1 col-md-2 col-sm-2">
    <div  class="product_one_sale_top">
      <div class="text-center">
          <img src="{{URL::to($vMenFashion -> product_image)}}" alt="prodcut on sale image" class="img-thumbnail" style="margin-top:1rem;">
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
            <input type="hidden" name="productId" value="{{$vMenFashion->product_id}}" />
          <button type="submit" class="btn btn-secondary" title="Add to Cart">
              <i class="fa fa-shopping-cart"></i>
            </button>
          </form>

          
          <a href="{{URL::to('/productDetails/'.$vMenFashion->product_id)}}"><h5 class="product_name">{{$vMenFashion -> product_name}}</h5></a>
          
          <h6 class="price_tag">{{$vMenFashion -> product_price}} TK</h6>
      </div>
  </div>

    <?php }?>

    </div>
    </div>

  </div>
</section><br>



<!-- ==================================================================== Men's Fashion end here ===================================================== -->



<section>


  <!-- =================================================== Phone & computer heading start here ============================================= -->


  <div class="container">
    <!-- <div class="row_two"> -->
      <div class="row">
       <div class="col-md-offset-1 col-lg-3 col-sm-3" style="/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#bf6e4e+0,347099+40,4b8e77+60,bf6e4e+100 */
       background: rgb(191,110,78); /* Old browsers */
       background: -moz-linear-gradient(-45deg,  rgba(191,110,78,1) 0%, rgba(52,112,153,1) 40%, rgba(75,142,119,1) 60%, rgba(191,110,78,1) 100%); /* FF3.6-15 */
       background: -webkit-linear-gradient(-45deg,  rgba(191,110,78,1) 0%,rgba(52,112,153,1) 40%,rgba(75,142,119,1) 60%,rgba(191,110,78,1) 100%); /* Chrome10-25,Safari5.1-6 */
       background: linear-gradient(135deg,  rgba(191,110,78,1) 0%,rgba(52,112,153,1) 40%,rgba(75,142,119,1) 60%,rgba(191,110,78,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
       filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bf6e4e', endColorstr='#bf6e4e',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
       ">
          <h6 class="section_head3">
            Phone & Computer
          </h6>
       </div>
       <div class="col-md-offset-1 col-lg-9 col-sm-9">
        <div class="row_three">
          <h6 class="section_divider">
            
          </h6>
        </div>
     </div>
      </div>
    <!-- </div> -->

    <!-- =============================================== Phone & computer  heading end here ======================================== -->
    
    
    <div class="computer_background">
      <div class="row">

  <!-- ============================================= Phone & computer  1st product is here ======================================== -->



  <?php 
  
foreach($phoneAndComputerProduct as $vPhoneAndComputer)
{

?>
  <div class="col-md-offset-1 col-md-2 col-sm-2">
    <div  class="product_one_sale_top">
      <div class="text-center">
          <img src="{{URL::to($vPhoneAndComputer -> product_image)}}" alt="prodcut on sale image" class="img-thumbnail" style="margin-top:1rem;">
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
            <input type="hidden" name="productId" value="{{$vPhoneAndComputer->product_id}}" />
          <button type="submit" class="btn btn-secondary" title="Add to Cart">
              <i class="fa fa-shopping-cart"></i>
            </button>
          </form>

            <a href="{{URL::to('/productDetails/'.$vPhoneAndComputer->product_id)}}"><h5 class="product_name">{{$vPhoneAndComputer -> product_name}}</h5></a>
            
          <h6 class="price_tag">{{$vPhoneAndComputer -> product_price}} TK</h6>
      </div>
  </div>



  <?php }?>

  



      </div>
    </div>
  </div>
</section><br>






@endsection
