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
        $this->middleware(['auth', 'role:super']);
    }
    

    public function index()
    {
        $users = User::where('role', 'basic')->paginate(10);
        return view('super.user.index', compact('users'));
    }
}
