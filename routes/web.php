<?php

use Illuminate\Support\Facades\Route;

use App\User;
use App\Organizer;
use App\Gamer;
use App\Tournaments;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Welcome Page
Route::get('/', function () {

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

    return view('welcome',compact('tournaments'));
});

Auth::routes();

//Login Routes
Route::get('/login', 'LoginController@getLog')->name('login');
//Route::get('/register', 'LoginController@getRegister')->name('register');
//Route::get('/forget', 'LoginController@forgetUser')->name('get.forget');
Route::post('user-login', [
    'uses' => 'LoginController@login',
    'as' => 'user.login'
]);





//organizer
Route::get('/organizer-register', 'OrganizerController@organizerRegistration')->name('organizer.register');
//organizer profile
Route::get('/organizer-profile', 'OrganizerController@o_profileGet')->name('organizer.profileGet');
Route::post('/organizer-profile', 'OrganizerController@o_profilePost')->name('organizer.profilePost');
Route::post('/organizer-photo', 'OrganizerController@o_storeprofile')->name('organizer.storeprofile');
//organizer change password
Route::get('/organizer-changepassword', 'OrganizerController@changePassGet')->name('organizer.changePassGet');
Route::post('/organizer-changepassword', 'OrganizerController@changePassPost')->name('organizer.changePassPost');
//Tournaments
Route::get('/organizer-tournaments', 'OrganizerController@tournamentsGet')->name('organizer.tournamentsGet');
Route::post('/organizer-tournaments', 'OrganizerController@addTournament')->name('organizer.addTournament');
Route::get('/organizer-tournaments-update{id}', 'OrganizerController@updateTournamentGet')->name('organizer.updateTournamentGet');
Route::post('/organizer-tournaments-update', 'OrganizerController@updateTournamentPost')->name('organizer.updateTournamentPost');
Route::get('/organizer-tournaments-delate{id}', 'OrganizerController@deleteTournament')->name('organizer.deleteTournament');
Route::post('/organizer-participates-update', 'OrganizerController@updateParticipatePost')->name('organizer.updateParticipatePost');
//Round
Route::post('/organizer-rounds', 'OrganizerController@addRound')->name('organizer.addRound');
//Room
Route::post('/organizer-rooms', 'OrganizerController@addRoom')->name('organizer.addRoom');
//Update
Route::post('/organizer-rooms-update', 'OrganizerController@updateRoomPost')->name('organizer.updateRoomPost');
//Delete
Route::get('/organizer-rooms-delate{id}', 'OrganizerController@deleteRoom')->name('organizer.deleteRoom');
//PlayGround
Route::post('/organizer-playgrounds', 'OrganizerController@addPlayGround')->name('organizer.addPlayGround');
//Delete
Route::get('/organizer-playgrounds-delate{id}', 'OrganizerController@deletePlayground')->name('organizer.deletePlayground');
//Pick next round
Route::get('organizer-pick-next-round{gamer}{tournament}', 'OrganizerController@pickNextRound')->name('organizer.pickNextRound');

//Admin
Route::get('/admin-profile', 'AdminController@a_profileGet')->name('admin.profileGet');
Route::post('/admin-profile', 'AdminController@a_profilePost')->name('admin.profilePost');
Route::post('/admin-photo', 'AdminController@a_storeprofile')->name('admin.storeprofile');
//AddGame
Route::get('add-game', 'AdminController@addGames')->name('add.game');
Route::post('add-game', 'AdminController@uploadGames')->name('upload.game');
//organizer change password
Route::get('/admin-changepassword', 'AdminController@changePassGet')->name('admin.changePassGet');
Route::post('/admin-changepassword', 'AdminController@changePassPost')->name('admin.changePassPost');




//Home Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'HomeController@admin_index')->name('admin.home');
    Route::get('/organizer', 'HomeController@organizer_index')->name('organizer.home');
});


//gammer
Route::get('/profile', 'GamerController@g_profileGet')->name('gamer.profileGet');
Route::post('/profile', 'GamerController@g_profilePost')->name('gamer.profilePost');
Route::post('/gamer-photo', 'GamerController@storeprofile')->name('gamer.storeprofile');
//gammer change password
Route::get('/changepassword', 'GamerController@changePassGet')->name('gamer.changePassGet');
Route::post('/changepassword', 'GamerController@changePassPost')->name('gamer.changePassPost');
Route::get('/participate-tournament{id}', 'GamerController@tournamentGet')->name('gamer.tournamentGet');
Route::post('/participate-tournament', 'GamerController@participatePost')->name('gamer.participatePost');
Route::get('/participate-history', 'GamerController@partipateGet')->name('gamer.partipateGet');
//PlayGround
Route::post('/playgrounds-join', 'GamerController@joinPlayGround')->name('gamer.joinPlayGround');
