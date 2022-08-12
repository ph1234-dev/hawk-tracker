<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ApplicationDataController;
use App\Http\Controllers\FoodController;


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

// Route::get('/', function () {
//     return view('root');
// })->name('root');


// # Clear the old boostrap/cache/compiled.php
// php artisan clear-compiled

// !!!everytime you add a route you need to run 
// # Recreate boostrap/cache/compiled.php
// php artisan optimize

// Futher explaination: https://stackoverflow.com/questions/69970465/always-need-to-optmize-when-i-changed-somthing-in-web-php-laravel8
// php artisan optimize command will cache your events, 
// views,cache,routes,Configuration so if your application 
// is in local environment don't cache these. To remove all 
// from cache you run "php artisan optimize:clear"
// --- use this para di ka sige php artisan optimize kada add mo ng baogng route o change ng dev config

// # Migrate any database changes
// php artisan migrate


Route::get("home",[ApplicationDataController::class,'init'])->name("home");

Route::prefix("account")->group(function(){

    Route::get('register',function(){
        return view('account/register');
    })->name('show.register.form');

    Route::get('login',function(){
        return view("account/login");
    })->name('show.login.form');

    Route::post('register_success',[
        AccountController::class,'create'
        ])->name('create.user');
    
    // login
    Route::get('authenticate',[
        AccountController::class,
        'authenticate_user'
    ])->name("authenticate.user");

    // logout
    Route::get('logout',function(){
        if ( session()->has('user') ){
            session()->pull('user');
            session()->pull('user_id');
            session()->pull('food_record');

            // destroys all sessions
            session()->flush();
        }
        // redirect
        // https://laravel.com/docs/9.x/redirects#redirecting-named-routes
        return redirect()->route('show.login.form');
    })->name("logout.user");

    Route::get('update',[
        AccountController::class,
        'retrieve_account'])->name("retrieve.account");

    Route::post('update_account',[
        AccountController::class,
        'update'])->name("update.account");

    Route::get('profile',[AccountController::class,'show_profile'])->name('show.profile');
});


Route::get("record",[FoodController::class,'show'])->name("show.list.food");

Route::prefix("food")->group(function(){

    Route::get('form',function(){
        return view("food/store");
    })->name('show.food.form');
    
    Route::get('record',[FoodController::class,'show_entire_food_record'])->name('show.paginated.food.record');


    Route::post('store',[
        FoodController::class,
        'store'])->name("store.food");

    // used to show update page
    Route::get('update/food={id}',[FoodController::class,'show_food_update_page'])->name('show.food.update.page');
   
    // used to update db
    Route::post('update/food={id}',[FoodController::class,'update_food_record'])->name('update.food.record');
});

// always call php artisan if ading new routes.. howver optimze
// php artisan optimize:clear <- call this 

// all coming from js should pass here.. will transer all form above here next

// enable cors/
// 1. php artisan make:middleware Cors
// 2. go to App\Http\Middleware then attach replace return of 
//      handle with return $next($request)->header('Access-Control-Allow-Origin', '*');
// 3. Add the middleware to Kernel.php by going to routemilleware then add 
//      in the end "'cors' => \App\Http\Middleware\Cors::class, // added"

// 4. then set all routes that use cors 
//      Route::middleware(['cors'])->group(function () {
//          Route::post('/hogehoge', 'Controller@hogehoge');
//      });


//https://dev.to/keikesu0122/a-simple-way-to-enable-cors-on-laravel-55i#:~:text=The%20simplest%20method%20to%20enable,%3Ahttps%3A%2F%2Fhogehoge.com%20.
Route::middleware(['cors'])->group(function () {
    Route::get('/check_username/:username',[
        AccountController::class,
        'check_username'
    ]);
});

Route::get('/',function(){
    return view('landing_page');
})->name('landing');

Route::fallback(function () {
    return view("/common/page404");
});

Route::get('delete_food/{data}',[FoodController::class,'delete'])->name('delete.stored.food');


Route::prefix('report')->group(function(){
    Route::get('/',[FoodController::class,'show_weekly_record'])->name('show.weekly.report');
    Route::get('/date={date}',[FoodController::class,'show_weekly_record_specific_date'])->name('show.weekly.report.specific');
});