<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (Auth::check()){
            if (Auth::user()->role == 'Administrator'){
                return view('admin.home');
            }elseif (Auth::user()->role == 'Masjid'){
                return view('admin-masjid.home');
            }
        }else{
            return view('login');
        }
    }
}
