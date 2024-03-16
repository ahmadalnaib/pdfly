<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'role:super','verified']);
    }
    
    public function index() {
        // Example data fetching, adapt according to your needs
      // Fetch data
    $salesData = Sale::selectRaw('month(created_at) as month, sum(price) as total, count(*) as count')
    ->groupBy('month')
    ->get();
        $usersData = User::selectRaw('month(created_at) as month, count(*) as count')
                         ->groupBy('month')
                         ->get();
        
        // Pass data to the view
        return view('super.dashboard', compact('salesData', 'usersData'));
    }
}
