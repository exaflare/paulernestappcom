<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentPath= Route::getFacadeRoot()->current()->uri();
        $user = Auth::user();
        $skills = DB::table('skills')->paginate(10);
        
        return view('profile')->with(['user' => $user, 'skills'=> $skills,'route'=>$currentPath]);;
    }

}
