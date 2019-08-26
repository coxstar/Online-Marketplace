<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class sliderController extends Controller
{
    public function index()
    {
        return view('admin.addSlider');
    }

    public function saveSlider(Request $request)
    {

        $data = array();

        $data['publication_status']= $request->publicationStatus;

        $image=$request->file('slider_image');

            if($image)
            {
                $image_name =str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'slider/';
                $image_url = $upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

                if($success)
                {
                    $data['slider_image']= $image_url;

                        DB::table('tbl_slider')->insert($data);
                        Session::put('message','Slider added successfully!!');
                        return Redirect::to('/addSlider');

                        
                }
            }

            $data['slider_image']='';
            DB::table('tbl_slider')->insert($data);
            Session::put('message','Slider added successfully without image!!');

            return Redirect::to('/addSlider');
    }


    public function allSlider()
    {
        $allSliderInfo = DB::table('tbl_slider')
                ->get();
        $mangeSlider = view('admin.allSlider')
            ->with('allSliderInfo',$allSliderInfo);

        return view('adminLayout')
            ->with('admin/allSlider',$mangeSlider);
    }




    public function inactiveSlider($sliderId)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$sliderId)
                       
            ->update(["publication_status" => 0]);
            Session::put('message','Slider inactive successfully !!');
                return Redirect::to('/allSlider');
    }

    public function activeSlider($sliderId)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$sliderId)
                       
            ->update(["publication_status" => 1]);
            Session::put('message','Slider active successfully !!');
                return Redirect::to('/allSlider');
    }


    public function deleteSlider($sliderId)
        {
            Db::table('tbl_slider')
                ->where('slider_id',$sliderId)
                ->delete();

                Session::put('message','Slider deleted Successfully !!');
                return Redirect::to('/allSlider');
        }


    
}
