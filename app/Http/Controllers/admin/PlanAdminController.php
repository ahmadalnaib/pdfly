<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanAdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'role:super','verified']);
    }
    

    public function index()
    {
        $plans = Plan::all();
        return view('super.plan.index',compact('plans'));
    }


    public function create()
    {
        return view('super.plan.create');
    }

    public function store(Request $request)
    {
       $request->validate([
           'name' => 'required',
           'price' => 'required',
           'credits' => 'required',
           'description' => 'required',
           'live' => 'required',
          
       ]);
      
     $plan= Plan::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
        'slug' => Str::slug($request->name) . '-' . time(),
        'price' => $request->price,
        'credits' => $request->credits,
        'description' => $request->description,
        'live' => $request->has('live') ? 1 : 0
    ]);

    return redirect()->route('plan.index');


    }

    public function edit(Plan $plan)
    {
   
        return view('super.plan.edit',compact('plan'));
    }

    public function update(Request $request ,Plan $plan)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'credits' => 'required',
            'description' => 'required',
            'live' => 'required',
           
        ]);
       
 
      $plan->update([
         'user_id' => auth()->id(),
         'name' => $request->name,
         'slug' => Str::slug($request->name) . '-' . time(),
         'price' => $request->price,
         'credits' => $request->credits,
         'description' => $request->description,
         'live' => $request->has('live') ? 1 : 0
     ]);

     return redirect()->route('plan.index');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->back();
    }
}
