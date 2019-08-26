<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Http\Request;
Session_start();

class superAdminController extends Controller
{
    
    public function index()
    {
        $this->adminAuth();
        
        return view('admin/dashboard');
       
    }


    public function logout()
    {
        // Session::put('admin_name',null);
        // Session::put('admin_id',null);

        Session::flush();

        return Redirect::to('/admin');
    }


    public function adminAuth()
    {
        $adminID = Session::get('admin_id');
        
        if($adminID)
        {
            return;
        }
        else
        {
            return Redirect::to('/admin')->send();
        }
    }

}
