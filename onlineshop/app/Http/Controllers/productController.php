<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class productController extends Controller
{
    public function index()
    {
        return view('admin/addProduct');
    }

    public function saveProduct(Request $request)
    {
        $data = array();

            $data['product_name']= $request->productName;
            $data['category_id']= $request->categoryId;
            $data['product_price']= $request->productPrice;
            
            $data['product_color']= $request->productColor;
            $data['product_description']= $request->productDescription;
            $data['publication_status']= $request->publicationStatus;


            $image=$request->file('productImage');

            if($image)
            {
                $image_name =str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'images/';
                $image_url = $upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

                if($success)
                {
                    $data['product_image']= $image_url;

                        DB::table('tbl_products')->insert($data);
                        Session::put('message','product added successfully!!');
                        return Redirect::to('/addProduct');

                        
                }
            }

            $data['product_image']='';
            DB::table('tbl_products')->insert($data);
            Session::put('message','Product added successfully without image!!');

            return Redirect::to('/addProduct');

            
            
    }



    public function allProduct()
    {
        $allProductInfo = DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                ->select('tbl_products.*','tbl_category.category_name')
                ->get();
        $mangeProduct = view('admin.allProduct')
            ->with('allProductInfo',$allProductInfo);

        return view('adminLayout')
            ->with('admin/allProduct',$mangeProduct);
    }


    public function inactiveProduct($productId)
    {
        
        DB::table('tbl_products')
            ->where('product_id',$productId)
                       
            ->update(["publication_status" => 0]);
            Session::put('message','Product inactive successfully !!');
                return Redirect::to('/allProduct');
    }

    public function activeProduct($productId)
    {
        
        DB::table('tbl_products')
            ->where('product_id',$productId)
                       
            ->update(["publication_status" => 1]);
            Session::put('message','Product active successfully !!');
                return Redirect::to('/allProduct');
    }

    public function deleteProduct($productId)
        {
            Db::table('tbl_products')
                ->where('product_id',$productId)
                ->delete();

                Session::get('message','Product deleted Successfully');
                return Redirect::to('/allProduct');
        }


        public function editProduct($productId)
        {
            
            $productInfo=DB::table('tbl_products')
                    ->where('product_id',$productId)
                    ->first();

            $productInfo = view('admin.editProduct')
                ->with('productInfo',$productInfo);

            return view('adminLayout')
                ->with('admin/editProduct',$productInfo);


        
        }


        public function updateProduct(Request $request,$productId)
        {
            $data = array();
            $data['product_name']= $request->productName;
            $data['product_description']=$request->productDescription;

            $data['product_name']= $request->productName;

            $data['category_id']= $request->categoryId;

            $data['product_price']= $request->productPrice;

            // $data['product_image']= $request->productImage;

            $data['product_color']= $request->productColor;

            $image=$request->file('productImage');

            if($image)
            {
                $image_name =str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'images/';
                $image_url = $upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

                if($success)
                {
                    $data['product_image']= $image_url;

                    DB::table('tbl_products')
                    ->where('product_id',$productId)
                    ->update($data);
         
                     Session::get('message','product updated Successfully');
                         return Redirect::to('/allProduct');

                        
                }
            }

            $data['product_image']='';
            DB::table('tbl_products')
           ->where('product_id',$productId)
           ->update($data);

            Session::get('message','product updated Successfully without image');
                return Redirect::to('/allProduct');

           
           
            
        }
}
