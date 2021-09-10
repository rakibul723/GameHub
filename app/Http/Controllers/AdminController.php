<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;

use App\User;
use App\Gamer;
use App\Organizer;
use App\Admin;

use File;
use DB;


class AdminController extends Controller
{

    //Profile
public function a_profileGet()
{
    if(Session::get('admin_value')){
        $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
        $admins = DB::table('admins')->where('email', Auth::user()->email)->first();     
        if($user){
        return view('admin/profile',compact('user','admins'));  
        }  
    }
    return redirect()->route('login');          
}

public function a_profilePost(Request $request)
{       
        $email = $request->email;
        $admins = DB::table('admins')->where('email', $email)->update([ 'age' => $request->age,  'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone]);
        $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);
        return redirect()->route('admin.profileGet');                    
}


//Profile pic     
public function a_storeprofile(Request $request)
{
    $admin = Admin::find($request->id);
    if($admin->profileimage){
        if(file_exists($admin->profileimage)){
            unlink($admin->profileimage);
        }
    }        
    $profile_image = $request->file('p_file');
    $profile_destination = 'adminImages/'.time().'.'.$profile_image->extension();
    $profile_image->move(public_path('adminImages'),$profile_destination);
    $admin->profileimage = $profile_destination;
    $admin->save();
    return redirect()->route('admin.profileGet');
}




//Change Password
public function changePassGet()
{
    if(Session::get('admin_value')){
        $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
        $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
        if($user){
            return view('admin/changepassword',compact('admins','user'));
        }   
    }        
}  

public function changePassPost(Request $request)
{
    $current_pass = $request->c_pass;
    $new_pass = Hash::make($request->n_pass);
    $admins = DB::table('users')->where('email', Auth::user()->email)->first();
    if($admins){
        $dbpass = $admins->password;
    }
    if(Hash::check($current_pass, $dbpass)){
        $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
        return redirect()->back()->withErrors([' Password changed ! ']);
    }
    return redirect()->back()->withErrors([' Current password credential ! ']);   
}  

public function addGames()
{
    return view('admin.addgame');
}

public function uploadGames(Request $request)
{
    $data= array();
    $data['game_name'] = $request->game_name;
    $data['game_details'] = $request->game_details;
    $image= $request->file('game_logo');
    if($image)
    {
        $image_name = data('dmy_H_s-i');
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'gameLogo';
        $image_url = $upload_path.$image_full_name;
        $success = $image->move($upload_path,$image_full_name);
        $data['logo'] = $image_url;
        $addgame = DB::table('addgame')->insert(data);
        


    }
    $images= $request->file('game_file');
    if($images)
    {
        $image_name = data('dmy_H_s-i');
        $ext = strtolower($images->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'gameFile';
        $image_url = $upload_path.$image_full_name;
        $success = $images->move($upload_path,$image_full_name);
        $data['logo'] = $image_url;
        $addgame = DB::table('addgame')->insert(data);
        return redirect()->route('add.game');
        

    }




}



 

}
