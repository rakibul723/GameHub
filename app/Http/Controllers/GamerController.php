<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use Auth;
use Session;

use App\Gamer;
use App\Tournaments;
use App\Participate;


use App\Round;
use App\Room;
use App\PlayGround;


use File;
use DB;



class GamerController extends Controller
{

    //Profile
    public function g_profileGet()
    {
        if(Session::get('user_value')){
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            $gamers = DB::table('gamers')->where('email', Auth::user()->email)->first();     
            if($user){
            return view('profile',compact('user','gamers'));  
            }  
        }
        return redirect()->route('login');          
    }

    public function g_profilePost(Request $request)
    {       
            $email = $request->email;
            $gamers = DB::table('gamers')->where('email', $email)->update([ 'age' => $request->age,  'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone]);
            $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);

            $gamer = Gamer::find($request->id);

            if($request->file('n_id')){
                if($gamer->n_id){
                    if(file_exists($gamer->n_id)){
                        unlink($gamer->n_id);
                    }
        
                }             
                $NID = $request->file('n_id');
                $NID_destination = 'gamerNID/'.time().'.'.$NID->extension();
                $NID->move(public_path('gamerNID'),$NID_destination);
                $gamer->n_id = $NID_destination;
                $gamer->save();
            }       
            return redirect()->route('gamer.profileGet');                    
    }

    //Profile pic     
    public function storeprofile(Request $request)
    {
        $gamer = Gamer::find($request->id);
        if($gamer->profile_img){
            if(file_exists($gamer->profile_img)){
                unlink($gamer->profile_img);
            }
        }        
        $profile_image = $request->file('p_file');
        $profile_destination = 'gamerImages/'.time().'.'.$profile_image->extension();
        $profile_image->move(public_path('gamerImages'),$profile_destination);
        $gamer->profile_img = $profile_destination;
        $gamer->save();
        return redirect()->route('gamer.profileGet');
    }




    //Change Password
    public function changePassGet()
    {
        if(Session::get('user_value')){
            $gamers = DB::table('gamers')->where('email', Auth::user()->email)->first();  
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            if($user){
                return view('changepassword',compact('gamers','user'));
            }   
        }        
    }  
    public function changePassPost(Request $request)
    {
        $current_pass = $request->c_pass;
        $new_pass = Hash::make($request->n_pass);
        $gamers = DB::table('users')->where('email', Auth::user()->email)->first();
        if($gamers){
            $dbpass = $gamers->password;
        }
        if(Hash::check($current_pass, $dbpass)){
            $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
            return redirect()->back()->withErrors([' Password changed ! ']);
        }
        return redirect()->back()->withErrors([' Current password credential ! ']);   
    } 

    //Tournaments
    public function tournamentGet($id)
    {
        $tournaments = Tournaments::find($id);

        $organizer = DB::table('organizers')->where('email', $tournaments->organizer)->first();
        $phone = $organizer->phone;

        return view('participateTournament',compact('tournaments','phone')); 
    } 
    //Participate
    public function participatePost(Request $request)
    {
            if(Session::get('user_value')){
                $participates = new Participate; 
                $participates->tournament= $request->tournament_id;
                $participates->organizer_email= $request->t_organizer;
                $participates->gamer_email= Auth::user()->email;



                $participates->participate_fee= $request->p_fee;

                $participates->organizer_bkash= $request->organizer_bkash;
                $participates->gamer_bkash= $request->gamer_bkash;
                $participates->transaction_id= $request->t_id;
                $participates->fee= "Pending";
                $participates->save();
                return redirect()->route('gamer.partipateGet');
            }
            return redirect()->route('login');      
    }
    //History
    public function partipateGet()
    {
            if(Session::get('user_value')){
                $tournaments = Tournaments::all();
                $participates = Participate::all();

                $rounds = Round::all();
                $rooms = Room::all();
                $playgrounds = PlayGround::all();


                

                return view('participates',compact('tournaments','participates','rounds','rooms','playgrounds')); 
            }
            return redirect()->route('login');
    }
    //PlayGround
    //Add
    public function joinPlayGround(Request $request)
    {
        if(Session::get('user_value')){
            $playgrounds = new PlayGround;

            $playgrounds->round= $request->round;
            $playgrounds->room= $request->room;
            $playgrounds->tournament= $request->tournament; 

            $round = Round::find($request->round);

            $room = Room::find($request->room);
            $room->max_player = $room->max_player - 1 ;
            $room->save();

            $participates = DB::table('participates')->where('tournament', $request->tournament)->where('gamer_email', Auth::user()->email)->update(['round' => $round->round_number, 'next_round' => 0 ]);

            $playgrounds->gamer_screen= $request->gamer_screen; 
            $playgrounds->gamer_email= Auth::user()->email;
            $playgrounds->save();

            return redirect()->route('gamer.partipateGet');
        }
        return redirect()->route('login');      
    }   

}
