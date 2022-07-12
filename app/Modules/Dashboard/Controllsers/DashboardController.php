<?php namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller{

    public function index(Request $request){
        return view('Dashboard::dashboard',['title'=>'WebUX']);
    }
}