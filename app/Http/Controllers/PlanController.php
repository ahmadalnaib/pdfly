<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function __invoke()
    {
        $plans = Plan::all();
        return view('plan.index', compact('plans'));
    }
}
