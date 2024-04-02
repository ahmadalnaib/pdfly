<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'role:super','verified']);
    }
    

    public function index()
    {
        $users = User::where('role', 'basic')->paginate(20);
        return view('super.user.index', compact('users'));
    }
}
