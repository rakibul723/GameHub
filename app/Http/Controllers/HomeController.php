<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Organizer;
use App\Gamer;
use App\Tournaments;

use Session;
use DB;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Session::get('organizer_email')){
            $User = DB::table('users')->where('email', Session::get('organizer_email'))->update(['organizer' => 1]);
            $u_name = DB::table('users')->where('email', Session::get('organizer_email'))->first();
            $organizer = new Organizer;
            $organizer->email = Session::get('organizer_email');
            $organizer->save();
            Session::put('organizer_email', 0);                             
        }
        
        
        if(Session::get('user_email')){
            $user = DB::table('users')->where('email', Session::get('user_email'))->first();
            $gamer = new Gamer;
            $gamer->email = Session::get('user_email');
            $gamer->save(); 
            Session::put('user_email', 0);                             
        }   
        
        $tournaments = Tournaments::all();
        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('organizer_value')){ 
            $organizers = DB::table('organizers')->where('email', Auth::user()->email)->first();     
                return view('organizer/home',compact('organizers'));

        }  
        
        if(Session::get('user_value')){
            return view('home',compact('tournaments'));
        } 

        return redirect()->route('login');      

    }
 
    public function admin_index()
    {
        $tournaments = Tournaments::all();
        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('organizer_value')){ 
            $organizers = DB::table('organizers')->where('email', Auth::user()->email)->first();     
                return view('organizer/home',compact('organizers'));

        }  
        
        if(Session::get('user_value')){
            return view('home',compact('tournaments'));
        } 

        return redirect()->route('login');    
    }
    
    public function organizer_index()
    {
        $tournaments = Tournaments::all();
        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('organizer_value')){ 
            $organizers = DB::table('organizers')->where('email', Auth::user()->email)->first();     
                return view('organizer/home',compact('organizers'));

        }   
        
        if(Session::get('user_value')){
            return view('home',compact('tournaments'));
        } 

        return redirect()->route('login');    
    } 
    
       

    public function welcome()
    {
        $tournaments = Tournaments::all();

        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('organizer_value')){ 
            $organizers = DB::table('organizers')->where('email', Auth::user()->email)->first();     
                return view('organizer/home',compact('organizers'));

        }   
        
        if(Session::get('user_value')){
            return view('home');
        } 
        
        return view('welcome',compact('tournaments'));
    }    

  
}
