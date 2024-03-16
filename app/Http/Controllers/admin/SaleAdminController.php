<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaleAdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'role:super','verified']);
    }
    
    public function index() {

        $sales=Sale::all();
        return view('super.sales.index',compact('sales'));
    }
}
