<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;
use File;
use DB;

use App\Organizer;
use App\Tournaments;
use App\Participate;

use App\Round;
use App\Room;
use App\PlayGround;


class OrganizerController extends Controller
{
    public function organizerRegistration()
    {
        return view('organizer/organizerRegistration');
    }
    //Profile
    public function o_profileGet()
    {
        if(Session::get('organizer_value')){
            $user = DB::table('users')->where('email', Auth::user()->email)->first();
            $organizers = DB::table('organizers')->where('email', Auth::user()->email)->first();
            if($user){
            return view('organizer/profile',compact('user','organizers'));
            }
        }
        return redirect()->route('login');
    }
    public function o_profilePost(Request $request)
    {
            $email = $request->email;
            $organizers = DB::table('organizers')->where('email', $email)->update([ 'age' => $request->age,  'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone]);
            $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);

            $organizer = Organizer::find($request->id);

            if($request->file('n_id')){
                if($organizer->n_id){
                    if(file_exists($organizer->n_id)){
                        unlink($organizer->n_id);
                    }

                }
                $NID = $request->file('n_id');
                $NID_destination = 'organizerNID/'.time().'.'.$NID->extension();
                $NID->move(public_path('organizerNID'),$NID_destination);
                $organizer->n_id = $NID_destination;
                $organizer->save();
            }
            return redirect()->route('organizer.profileGet');
    }

    //Profile pic
    public function o_storeprofile(Request $request)
    {
        $organizer = Organizer::find($request->id);
        if($organizer->profileimage){
            if(file_exists($organizer->profileimage)){
                unlink($organizer->profileimage);
            }
        }
        $profile_image = $request->file('p_file');
        $profile_destination = 'organizerImages/'.time().'.'.$profile_image->extension();
        $profile_image->move(public_path('organizerImages'),$profile_destination);
        $organizer->profileimage = $profile_destination;
        $organizer->save();
        return redirect()->route('organizer.profileGet');
    }

    //Change Password
    public function changePassGet()
    {
        if(Session::get('organizer_value')){
            $organizers = DB::table('organizers')->where('email', Auth::user()->email)->first();
            $user = DB::table('users')->where('email', Auth::user()->email)->first();
            if($user){
                return view('organizer/changepassword',compact('organizers','user'));
            }
        }
    }
    public function changePassPost(Request $request)
    {
        $current_pass = $request->c_pass;
        $new_pass = Hash::make($request->n_pass);
        $organizers = DB::table('users')->where('email', Auth::user()->email)->first();
        if($organizers){
            $dbpass = $organizers->password;
        }
        if(Hash::check($current_pass, $dbpass)){
            $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
            return redirect()->back()->withErrors([' Password changed ! ']);
        }
        return redirect()->back()->withErrors([' Current password credential ! ']);
    }

    //Tournaments
    public function tournamentsGet()
    {
        if(Session::get('organizer_value')){

            $organizers = DB::table('organizers')->where('email', Auth::user()->email)->first();
            $tournaments = Tournaments::all();

            if($organizers){
               return view('organizer/tournaments',compact('organizers','tournaments'));
            }

        }
        return redirect()->route('login');
    }
    //Add
    public function addTournament(Request $request)
    {
        if(Session::get('organizer_value')){
            $tournaments = new Tournaments;

            $poster = $request->file('poster');
            $poster_destination = 'tournamentsPoster/'.time().'.'.$poster->extension();
            $poster->move(public_path('tournamentsPoster'),$poster_destination);
            $tournaments->poster = $poster_destination;

            $tournaments->tournament_name= $request->t_name;
            $tournaments->game_name= $request->g_name;
            $tournaments->organizer= Auth::user()->email;
            $tournaments->start_date= $request->start_date;
            $tournaments->participate_fee= $request->participate_fee;
            $tournaments->prize_description= $request->prize_description;
            $tournaments->t_status= "Participation";
            $tournaments->save();
            return redirect()->route('organizer.tournamentsGet');
        }
        return redirect()->route('login');      
    }
    //Update
    public function updateTournamentGet($id)
    {
        if(Session::get('organizer_value')){

            $tournaments = Tournaments::find($id);
            $participates = Participate::all();

            $rounds = Round::all();
            $rooms = Room::all();
            $playgrounds = PlayGround::all();


            $organizers = DB::table('organizers')->where('email', Auth::user()->email)->first();
            if($organizers){
                return view('organizer/updateTournament',compact('tournaments','organizers','participates','rounds','rooms','playgrounds'));  
            } 
        }
        return redirect()->route('login');      
    }    
    public function updateTournamentPost(Request $request)
    {
        if(Session::get('organizer_value')){

            $tournaments = Tournaments::find($request->tournament_id);

            if($request->file('poster')){
                if($tournaments->poster){
                    if(file_exists($tournaments->poster)){
                        unlink($tournaments->poster);
                    }
                } 
                $poster = $request->file('poster');
                $poster_destination = 'tournamentsPoster/'.time().'.'.$poster->extension();
                $poster->move(public_path('tournamentsPoster'),$poster_destination);
                $tournaments->poster = $poster_destination;
            }
            else{
                $tournaments->poster = $request->p_poster; 
            }

            $tournaments->tournament_name= $request->t_name;
            $tournaments->game_name= $request->g_name;
            $tournaments->start_date= $request->start_date;
            $tournaments->participate_fee= $request->participate_fee;
            $tournaments->prize_description= $request->prize_description;

            $tournaments->t_status= $request->t_status; 

            $tournaments->save();
            return redirect()->route('organizer.tournamentsGet');
        }
        return redirect()->route('login');      
    }    
    //Delete
    public function deleteTournament($id)
    {
        if(Session::get('organizer_value')){
            $tournaments = Tournaments::find($id);
            if($tournaments->poster){
                if(file_exists($tournaments->poster)){
                    unlink($tournaments->poster);
                }
            } 
            
            $tournaments->delete();
            return redirect()->route('organizer.tournamentsGet');
        }
        return redirect()->route('login');      
    }
//Rounds
    //Add
    public function addRound(Request $request)
    {
        if(Session::get('organizer_value')){
            $rounds = new Round;

            $rounds->tournament= $request->tournament;
            $rounds->round_number= $request->round_number;

            $rounds->save();

            return redirect()->route('organizer.updateTournamentGet',$request->tournament);
        }
        return redirect()->route('login');      
    }
//Room
    //Add
    public function addRoom(Request $request)
    {
        if(Session::get('organizer_value')){
            $rooms = new Room; 

            $rooms->round= $request->round_number;
            $rooms->tournament= $request->tournament;

            $rooms->room_number= $request->room_number;
            $rooms->room_start_at= $request->room_start_at;
            $rooms->room_screen= $request->room_screen;
            $rooms->room_id= $request->room_id;
            $rooms->room_pass= $request->room_pass; 
            $rooms->max_player= $request->max_player;
            $rooms->room_status= "Starting";
            $rooms->save();

            return redirect()->route('organizer.updateTournamentGet',$request->tournament);
        }
        return redirect()->route('login');      
    }
    //Update
    public function updateRoomPost(Request $request)
    {
        if(Session::get('organizer_value')){

            $rooms = Room::find($request->r_id);

            $rooms->room_status= $request->r_status;
            $rooms->max_player= $request->max_player;

            $rooms->save();
            return redirect()->back();
        }
        return redirect()->route('login');      
    }
    //Delete
    public function deleteRoom($id)
    {
        if(Session::get('organizer_value')){
            $rooms = Room::find($id);         
            $rooms->delete();
            return redirect()->back();
        }
        return redirect()->route('login');      
    } 

//Playground
    //Pick next round
    public function pickNextRound($gamer_email, $tournament)
    {
        if(Session::get('organizer_value')){

            $participates = DB::table('participates')->where('tournament', $tournament)->where('gamer_email', $gamer_email)->update(['next_round' => 1 ]);
            return redirect()->back();

        }
        return redirect()->route('login');      
    }
    //Delete
    public function deletePlayground($id)
    {
        if(Session::get('organizer_value')){
            $playgrounds = PlayGround::find($id);         
            $playgrounds->delete();
            return redirect()->back();
        }
        return redirect()->route('login');      
    }     
//Participates
    //Approved fee
    public function updateParticipatePost(Request $request)
    {
        if(Session::get('organizer_value')){
            $participates = Participate::find($request->p_id);
            $participates->fee = $request->p_fee;
            $participates->save();
            return redirect()->back();
        }
        return redirect()->route('login');      
    } 


}
