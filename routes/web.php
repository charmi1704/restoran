<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\bookingController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\teamController;
use App\Http\Controllers\testimonialController;
use App\Http\Controllers\UserController;
use App\Models\Menu;
use App\Models\Team;

// use App\Http\Controllers\contactController;
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

Route::get('/', function () {
    $menu_arr=Menu::all();
    $team_arr=Team::all();
    return view('website.index',["menu_arr"=>$menu_arr],["team_arr"=>$team_arr]);
});

Route::get('/about', function () {
    $team_arr=Team::all();
    return view('website.about',["team_arr"=>$team_arr]);
});


Route::get('/booking',[BookingController::class,'booking']);
Route::post('/insert_booking',[bookingController::class,'store']);


Route::get('/contact',[contactController::class,'contact']);
Route::post('/insert_contact',[contactController::class,'store']);

Route::get('/menu',[menuController::class,'menu']);


Route::get('/service',[serviceController::class,'service']);

Route::get('/team',[teamController::class,'team']);

Route::get('/signup',[userController::class,'create']);
Route::post('/insert_signup',[userController::class,'store']);

Route::get('/login',[userController::class,'login']);
Route::post('/login_auth',[userController::class,'login_auth']);

Route::get('/userprofile',[userController::class,'userprofile']);
Route::get('/user_logout',[userController::class,'user_logout']);

Route::get('/forgotpass',[userController::class,'forgotpass']);
Route::post('/insert_forgotpass',[userController::class,'insert_forgotpass']);

Route::get('/enterotp',[userController::class,'enterotp']);
Route::post('/insert_enterotp',[userController::class,'insert_enterotp']);

Route::get('/reset_pass',[userController::class,'reset_pass']);
Route::post('/updatereset_pass/{id}',[userController::class,'updatereset_pass']);
//==================================================


Route::get('/admin_login',[AdminController::class,'admin_login'] );
Route::post('/adminlogin_auth',[AdminController::class,'adminlogin_auth']);

Route::get('/admin_logout',[AdminController::class,'admin_logout']);

Route::get('/amain', function () {
    return view('admin.amain');
});

Route::get('/add_menu', [menuController::class,'create']);
Route::post('/insert_menu', [menuController::class,'store']);
Route::get('/delete_menu/{id}', [menuController::class,'destroy']);
Route::get('/manage_menu', [menuController::class,'index']);


Route::get('/add_service', [serviceController::class,'create']);
Route::post('/insert_service', [serviceController::class,'store']);
Route::get('/delete_service/{id}', [serviceController::class,'destroy']);
Route::get('/manage_service', [serviceController::class,'index']);

Route::get('/add_team', [teamController::class,'create']);
Route::post('/insert_team', [teamController::class,'store']);
Route::get('/delete_team/{id}', [teamController::class,'destroy']);
Route::get('/manage_team', [teamController::class,'index']);


Route::post('/insert_booking', [bookingController::class,'store']);
Route::get('/manage_booking', [bookingController::class,'index']);
Route::get('/delete_booking/{id}', [bookingController::class,'destroy']);



Route::get('/blank', function () {
    return view('admin.blank');
});

Route::get('/manage_user', [UserController::class,'index']);
Route::get('/delete_user/{id}', [UserController::class,'destroy']);


Route::get('/manage_contact', [contactController::class,'index']);
Route::get('/delete_contact/{id}', [contactController::class,'destroy']);
