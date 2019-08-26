<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

use Illuminate\Support\Facades\Redirect;

use DB;

use App\Http\Requests;

use Session;

Session_start();

class cartController extends Controller
{
   public function addCart(Request $request)
   {
      $qty = $request->qty;
      $productId = $request->productId;
      $productInfo = DB::table('tbl_products')
              ->where('product_id',$productId)
               ->first();

     $data['qty'] =  $qty;
     $data['id'] = $productInfo->product_id;
     $data['name'] = $productInfo->product_name;
     $data['price'] = $productInfo->product_price;
     $data['weight'] = $productInfo->product_weight;
     $data['options']['image'] = $productInfo->product_image;

     Cart::add($data);

     return Redirect::to('/showCart');

     
                
   }


   public function showCart()
   {
      $allCart = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();


       $manageCart = view('pages.addCart')
                ->with('allCart',$allCart);
   
       return view('layout')
                ->with('pages.addCart',$manageCart);
   }


 


   public function deleteCart($rowId)
   {
      Cart::update($rowId,0);

      return Redirect::to('/showCart');
   }


   public function updateCart(Request $request)
   {
      $qty = $request->qty;
      $rowId = $request->rowId;

      Cart::update($rowId,$qty);
      
      return Redirect::to('/showCart');

   }
}
