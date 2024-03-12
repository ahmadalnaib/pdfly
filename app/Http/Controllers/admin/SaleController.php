<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'role:super']);
    }
    
    public function index() {

        $sales=Sale::all();
        return view('super.sales.index',compact('sales'));
    }
}
