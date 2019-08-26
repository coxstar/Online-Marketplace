<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class manageOrderController extends Controller
{
    public function manageOrder()
    {
        $allOrderInfo = DB::table('tbl_order')
                ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                ->select('tbl_order.*','tbl_customer.customer_name')
                ->get();
        $mangeOrder = view('admin.manageOrder')
            ->with('allOrderInfo',$allOrderInfo);

        return view('adminLayout')
            ->with('admin/manageOrder',$mangeOrder);
    }
}
