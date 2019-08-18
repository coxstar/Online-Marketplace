<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();
class adminController extends Controller
{
    public function index()
    {
        return view('adminLogin');
    }

    public function showDashboard()
    {
        return view('admin/dashboard');
    }


    public function dashboard(Request $request)
    {
        $admin_name = $request->username;
        $admin_password = md5($request->Password);
        $result = DB::table('tbl_admin')
            ->where('admin_name',$admin_name)
            ->where('admin_password',$admin_password)
            ->first();
            
        if($result)
        {
            Session::put('admin_email',$result->admin_email);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }
        else
        {
            Session::put('messege','email or password not currect');
            return Redirect::to('/admin');

        }
    }
}
