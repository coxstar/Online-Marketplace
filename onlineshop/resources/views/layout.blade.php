<!doctype html>
<html lang="en">
<head>
  <!-- ============================================================  Required meta tags ========================================================-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  
  <!-- ====================================================== Start Bootstrap CSS import files ==================================================== -->


  <link href="{{URL::asset('assets/bootstrap.min.css')}}" rel="stylesheet">
  
  <link href="{{URL::asset('assets/animate.css')}}" rel="stylesheet">




  <!-- ============================================== <link href="other/font-awesome.min.css" rel="stylesheet"> ======================================= -->

  <!-- <script src="https://kit.fontawesome.com/7fa72e104c.js"></script> -->

  
  <link href="{{URL::asset('assets/all.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/brands.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/solid.css')}}" rel="stylesheet">


  <!-- ============================================================  End Bootstrap CSS import files ====================================== -->
  

  <!-- ============================================================== Start CSS custom file ================================================-->
  <link rel="stylesheet" href="{{URL::asset('style.css')}}">
  <!-- ============================================================== End CSS custom file ===================================================-->




  <!-- ================================================================ TITLE ====================================================== -->
  <title>Home | ABC Shop</title>



</head>
<body style="background-color: #e4e4e4">


<!-- =========================================================  hot line bar start here ================================================ -->

<div class="container-fluid"> <!-- ========================top banner container ================================= -->
  <h6 class="hot_line">HOT LINE +880 1794 828321</h6>
</div>

<!-- ========================================================== hot line bar end here =========================================== -->


<!-- ======================================================== navbar start here ================================================== -->

<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
    <div class="container">

    <a href="{{URL::to('/')}}">
        <img src="images/logo4.PNG" alt="brand image" class="img-thumbnail" >
    </a>
    
     
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/')}}">HOME</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="category.html">ALL CATEGORY</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">ELECTRONICS</a>
              </li>
        </ul>
       
      <form class="searchBox">
          <input class="searchInput"type="text" name="" placeholder="Search">
              <button class="searchButton" href="#">
                  <!-- <i class="material-icons">
                       search
                  </i> -->
                  <i class="fas fa-search"></i>
              </button>
      </form>

      </div>
      
    </div>

    <div class="nav-item" >
      <a href="" data-placement="bottom" title="wishlist" class="nav-link" style="font-size:25px;color:#ffffff;margin-right: 2rem;"> <i class="far fa-heart"></i> </a>
    </div>
    
    <div class="nav-item" >
        <a href="{{url('/showCart')}}" data-placement="bottom" title="cart" class="nav-link" style="font-size:25px;color:#ffffff; " ><i class="fas fa-shopping-cart"></i> </a>
        </div>

    <div class="nav-item" >
  
    <?php
      $customerId=Session::get('customer_id');
      // $customerName=Session::get('customer_name');
    
    ?>

      <?php
        if($customerId !=NULL)
        {
      ?>   

        <a href="{{URL::to('/customerLogout')}}" data-placement="bottom" title="login" class="nav-link" name="customerName" style="font-size:15px;color:#ff6c6c;">Logout</a>
   
       <?php }else{?>

      <a href="{{URL::to('/loginCheck')}}" data-placement="bottom" title="login" class="nav-link" style="font-size:15px;color:#ff6c6c;"> Login </a>

      <?php }?>

        </div>
  </nav>

  <!-- <div class="container">
    <div class="row">
      <div class="col-md-offset-1 col-lg-2 col-sm-2">

      </div>
    </div>
  </div> -->
  


<!--  ======================================================= navbar end here =============================================== -->


@yield('content')








  <!-- ======================================================================== Start Footer ======================================================== -->


   <br><section style="background: #000;color: #ffffff;padding: 80px 0px;position: relative;">
    <div class="container">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-offset-1 col-lg-5 col-sm-5">
          <p> <a class="footer-link" href="about_us.html" >About Us</a> </p>
          <p> <a class="footer-link" href="page_not_found.html" >Our Policy</a> </p> 
          <p> <a class="footer-link" href="page_not_found.html" >Apply For Change Product</a> </p>
          <p> <a class="footer-link" href="page_not_found.html" >Delivery Policy</a> </p>

        </div>

        <div class="col-md-offset-1 col-lg-2 col-sm-2"></div>
        <div class="col-md-offset-1 col-lg-4 col-sm-4">

          
          <p> <i class="fa fa-phone" style="margin-right: 5px;"></i><a class="footer-link" href="">Contact With Us</a> </p>
          <p> <i class="fas fa-luggage-cart" style="margin-right: 5px;"></i><a class="footer-link" href="">All Category</a> </p>
          <p> <i class="fas fa-file-invoice-dollar" style="margin-right: 5px;"></i> <a class="footer-link" href="">Online Payment Details</a> </p>
          <p> <i class="fas fa-asterisk" style="margin-right: 5px;"></i><a class="footer-link" href="">Warranty Terms & Conditions</a> </p>
          <!-- <p><i class="fa fa-save"></i> info@company.com</p> -->

        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-1 col-lg-12 col-sm-12">
            <div class="footer-copyright" style=" font-weight: lighter;font-size:16px; text-align: center;margin-top: 10px;">
                <p>Copyright &copy; 2019 ABC Shop - all rights reserved</p>
              </div>

          <ul class="social-icon">
            <li><a href="" ><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="" ><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" ><i class="fab fa-google-plus-g"></i></a></li>
            <li><a href="#" ><i class="fab fa-instagram"></i></a></li>
            <li><a href="" ><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>

      </div>
    </div>
  </section> 


  <!-- =============================================================================== End Footer ====================================================== -->



  <!-- ======================================================================== Start Script import file ================================================= -->


  <script src="{{URL::asset('assets/jquery.js')}}"></script>
  <script src="{{URL::asset('assets/bootstrap.min.js')}}"></script>

  <script src="{{URL::asset('assets/all.js')}}"></script>
  <script src="{{URL::asset('assets/brands.js')}}"></script>
  <script src="{{URL::asset('assets/solid.js')}}"></script>

  <script src="assets/app.js"></script>
  


  <!-- ========================================================================== End Script import file ===================================================== -->


</body>
</html>
