<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use App\Http\Requests;

use Session;

Session_start();

class homeController extends Controller
{
    public function index()
    {
        // return view('pages/home');


        
        $mangePublishedProduct = view('pages.home')
            ->with('onSaleProduct',$onSaleProduct);

        return view('layout')
            ->with('pages.home',$mangePublishedProduct);
    }


    public function jewelry()
    {
        // return view('pages/home');


        
        $mangeJewelryProduct = view('pages.home')
            ->with('jewelryProduct',$jewelryProduct);

        return view('layout')
            ->with('pages.home',$mangeJewelryProduct);
    }



    public function menFashion()
    {
        // return view('pages/home');


        
        $mangeMenFashionProduct = view('pages.home')
            ->with('menFashionProduct',$menFashionProduct);

        return view('layout')
            ->with('pages.home',$mangeMenFashionProduct);
    }



    public function phoneAndComputer()
    {
        // return view('pages/home');


        $phoneAndComputerProduct = DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                ->select('tbl_products.*','tbl_category.category_name')
                ->where ('tbl_products.publication_status',1)
                ->where('tbl_products.category_id',5)
                ->limit(6)
                ->get();
        $mangePhoneAndComputerProductProduct = view('pages.home')
            ->with('phoneAndComputerProduct',$phoneAndComputerProduct);

        return view('layout')
            ->with('pages.home',$mangePhoneAndComputerProductProduct);
    }



    public function showProductByCategory($categoryId)
    {
        $productByCategory = DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                ->select('tbl_products.*','tbl_category.category_name')
                ->where ('tbl_category.category_id',$categoryId)
                ->where ('tbl_products.publication_status',1)
                ->limit(20)
                ->get();
        $mangeProductByCategory = view('pages.productByCategory')
            ->with('productByCategory',$productByCategory);

        return view('layout')
            ->with('pages.productByCategory',$mangeProductByCategory);
    }



    public function productDetails($productId)
    {
        $productDetails = DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                ->select('tbl_products.*','tbl_category.category_name')
                ->where ('tbl_products.product_id',$productId)
                ->where ('tbl_products.publication_status',1)
                ->first();
        $mangeProductDetails = view('pages.productDetails')
            ->with('productDetails',$productDetails);

        return view('layout')
            ->with('pages.productDetails',$mangeProductDetails);
    }
}
