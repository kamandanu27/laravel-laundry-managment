<?php

namespace App\Http\Controllers;

use App\User;
use App\Laundry;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
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
        $totalorder = Laundry::has('types')->count() ; 
        $confirmorder = Laundry::has('types') 
        ->where('confirmed', 1)
        ->count() ; 
        return view('dashboard')
       ->with('confirmorder',$confirmorder)
        
        ->with('totalorder',$totalorder)
        ;
    }
    
}
