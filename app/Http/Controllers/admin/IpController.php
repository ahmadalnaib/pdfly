<?php

namespace App\Http\Controllers\admin;

use App\Models\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IpController extends Controller
{
    
    public function index()
    {
        $ips=Upload::paginate(15);
        return view('super.ip.index',compact('ips'));
    }

    public function destroy($id)
    {
        $ip=Upload::find($id);
        $ip->delete();
        return redirect()->back();
    }


}
