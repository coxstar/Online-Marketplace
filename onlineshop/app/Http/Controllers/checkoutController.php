<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;
use Cart;

use App\Http\Requests;

use Session;
Session_start();

class checkoutController extends Controller
{
    public function loginCheck()
    {
        return view('pages/login');
    }

    public function customerRegistration(Request $request)
    {
        $data = array();

            $data['customer_name']= $request->customerName;
            $data['customer_email']= $request->customerEmail;
            $data['customer_password']= md5($request->customerPassword);
            $data['customer_mobile']= $request->customerMobileNumber;


        $customerId = DB::table('tbl_customer')
                        ->insertGetid($data);
            
            Session::put('customer_id',$customerId);
            Session::put('customer_name',$request->customerName);

            return Redirect('/checkout');

        
    }


    public function checkout()

    {
        return view('pages.checkout');
    }


    public function saveShippingDetails(Request $request)

    {
        $data = array();

            $data['shipping_email'] = $request->shippingEmail;

            $data['shipping_first_name'] = $request->shippingFirstName;

            $data['shipping_last_name'] = $request->shippingLastName;

            $data['shipping_mobile_number'] = $request->shippingMobileNumber;

            $data['shipping_address'] = $request->shippingAddress;

            $data['shipping_city'] = $request->shippingCity;

            $shippingInfo = DB::table('tbl_shipping')
                    ->insertGetid($data);

                Session::put('shipping_id',$shippingInfo);

                // echo "<pre>";
                // print_r($shippingInfo);
                // echo "</pre>";

                 return Redirect::to('/payment');
    }




     public function customerLogin(Request $request)
     {
         $customerEmail = $request->customerEmail;
         $customerPassword =md5($request->customerPassword);

         $result = DB::table('tbl_customer')
                 ->where('customer_email',$customerEmail)
                 ->where ('customer_password',$customerPassword)
                 ->first();

                 

                 if($result)
                  {
                      Session::put('customer_id',$result->customer_id);
                      return Redirect::to('/checkout');
                  }
                  else
                  {
                     return Redirect::to('/loginCheck');
                  }
     }

     public function customerLogout()
     {
         Session::flush();

         return Redirect::to('/');
     }



     public function payment()
     {


        return view('pages.payment');


        // $allCart = DB::table('tbl_category')
        // ->where('publication_status', 1)
        // ->get();


        // $manageCart = view('pages.payment')
        // ->with('allCart',$allCart);

        // return view('layout')
        // ->with('pages.payment');
     }


     public function placeOrder(Request $request)
     {
         $paymentMethod = $request->paymentMethod;

         $pData = array();

            $pData['payment_method']= $paymentMethod;

            $pData['payment_status']= 'pending';

            $paymentId =  DB::table('tbl_payment')
                    ->insertGetId($pData);

        $oData = array();
        $oData['customer_id'] = Session::get('customer_id');
        $oData['shipping_id'] = Session::get('shipping_id');
        $oData['payment_id'] = $paymentId;

        $oData['order_total']= Cart::total();
        $oData['order_status'] = 'pending';

        $orderId = DB::table('tbl_order')
                ->insertGetId($oData);


        
        $contents = Cart::content();

        $orderDetailsData = array();

        foreach($contents as $vContent)
        {
            $orderDetailsData['order_id'] = $orderId;

            $orderDetailsData['product_id'] = $vContent->id;

            $orderDetailsData['product_name'] = $vContent->name;

            $orderDetailsData['product_price'] = $vContent->price;

            $orderDetailsData['product_sales_quantity'] = $vContent->qty;



            DB::table('tbl_order_details')
                    ->insert($orderDetailsData);

            if($paymentMethod == 'handcash')
            {
                cart::destroy();
                return view('pages.handcash');
                
            }
            elseif($paymentMethod == 'paypal')
            {
                echo "paypal";
            }
            elseif($paymentMethod == 'bikash')
            {
                echo "bikash";
            }
            else
            {
                echo "not selected";
            }

        }




         
     }
}
