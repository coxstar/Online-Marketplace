<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class categoryController extends Controller
{
    public function index()
    {
        return view('admin.addCategory');
    }


    public function allCategory()
    {
        $allCategoryInfo = DB::table('tbl_category')
                ->get();
        $mangeCategory = view('admin.allCategory')
            ->with('allCategoryInfo',$allCategoryInfo);

        return view('adminLayout')
            ->with('admin/allCategory',$mangeCategory);
    }

    public function saveCategory(Request $request)
    {
        $data= array();
            $data['category_id']=$request->categoryId;
            $data['category_name']=$request->categoryName;
            $data['category_description']=$request->categoryDescription;
            $data['publication_status']=$request->publicationStatus;

            DB::table('tbl_category')->insert($data);

            Session::put('message','Category added successfully !!');
            return Redirect::to('/addCategory');
        
    }


    public function inactiveCategory($categoryId)
    {
        
        DB::table('tbl_category')
            ->where('category_id',$categoryId)
                       
            ->update(["publication_status" => 0]);
            Session::put('message','Category inactive successfully !!');
                return Redirect::to('/allCategory');
    }


    public function activeCategory($categoryId)
    {
        
        DB::table('tbl_category')
            ->where('category_id',$categoryId)
                       
            ->update(["publication_status" => 1]);
            Session::put('message','Category Activate successfully !!');
                return Redirect::to('/allCategory');
    }



        public function editCategory($categoryId)
        {
            
            $CategoryInfo=DB::table('tbl_category')
                    ->where('category_id',$categoryId)
                    ->first();

            $categoryInfo = view('admin.editCategory')
                ->with('categoryInfo',$CategoryInfo);

            return view('adminLayout')
                ->with('admin/editCategory',$categoryInfo);


        
        }


        public function updateCategory(Request $request,$categoryId)
        {
            $data = array();
            $data['category_name']= $request->categoryName;
            $data['category_description']=$request->categoryDescription;

           DB::table('tbl_category')
           ->where('category_id',$categoryId)
           ->update($data);

            Session::get('message','Category updated Successfully');
                return Redirect::to('/allCategory');
        }


        public function deleteCategory($categoryId)
        {
            Db::table('tbl_category')
                ->where('category_id',$categoryId)
                ->delete();

                Session::get('message','Category deleted Successfully');
                return Redirect::to('/allCategory');
        }

}
