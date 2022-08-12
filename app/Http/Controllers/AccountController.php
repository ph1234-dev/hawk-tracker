<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import this library.. otherwise you cant use 
use Illuminate\Support\Facades\DB;

// for hasing password
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    //
    public function create(Request $request){

        // built in function you only need to specify the content
        $request->validate([
                'name' => "required",
                'username' => [
                    "required","min:3",
                    // how to check db manually using unique
                    // https://www.youtube.com/watch?v=_dcpzViDDnU&ab_channel=RehanManzoor
                    Rule::unique(table: 'accounts', column: 'username' )
                ],
                // 'password' => "required|confirmed|min:3",
                // https://laravel.com/docs/5.2/validation#rule-confirmed
                // you need to add [your input field name]_confirmation to html then here
                // in controller
                'password_confirmation' => 'required',
                'calories' => 'required',
                'agree' => 'required'
            ],
            [
                // you need to add this array, 
                'name.required' => 'Dont just leave your username blank',
                'username.required' => 'Username cannot be blank',
                'username.unique' => 'Username taken already',
                'password.required' => 'Password cannot be blank',
                'calories.required' => 'Please specify how your daily target calories',
                'agree.required' => 'If you agree please tick the checkbox',
            ]
        );

        // error in die dump
        // password authentication failed for user "root"

        $username = $request->input('username');
        $name = $request->input('name');
        
        $password = $request->input('password');

        
        $calories = $request->input('calories');

        $status = "pass";

        // dd("iam herze");
        if( DB::table('accounts')->where('username',$username)->exists()){
            $status = "fail";
        }else{
            DB::insert("insert into accounts (username,name,password,target_calories)values (?,?,?,?)",
                    [
                        $username,
                        $name,
                        $password,
                        $calories
                    ]);

            $user = DB::select("select id,name from accounts where username=?",[$username]);
            $res = $user[0];
            // $request->session()->put('user',$res->name);
            // $request->session()->put('user_id',$res->id);
        }

        return view("account/register",['status'=>$status]);
   
    }

    // equivalent to login
    public function authenticate_user(Request $request){

        // returns an $error on view
        $request->validate([
                'username' => "required",
                'password'=> "required"
            ],
            [
                // you need to add this array, 
                'username.required' => 'Dont just leave your username blank',
                'password.required' => 'Password cannot be blank',
            ]);

        $username=$request->input('username');
        $password=$request->input('password');

        // $result = DB::select("select count(*) as value from accounts where username=? and password=?",[
        //                         $username,$password
        //                     ]);
        $exist = DB::table('accounts')
                    ->where('username',$username)
                    ->where('password', $password)
                    ->exists();


        if($exist){

            $user = DB::select("select id, name from accounts a 
                        where a.username=? and a.password=? ",
                          [$username,$password]);

                          
            // $user = DB::table('accounts')->select('name')->where('username',$username)->first();;
            
            // $data = var_dump(json_decode($user));
            $user = $user[0];
            // store as session
            $request->session()->put('user',$user->name);
            $request->session()->put('user_id',$user->id);
        
            // load data
           

            // $record = DB::table('food_record')->paginate(4);
            // $request->session()->put('food_record',$records);
            // return view("home");
            
            // passing data in redicted reditect()->route('home',['data'=>'your data'])
            // return redirect()->route('home',['user'=>$user->name]);

            return redirect()->route('home');

        }else{

            // $status = "fail";
            // return view that said user does not exists
            // login here is the name of blade file
            return view("account/login",[
                'error'=> "Account does not exist!"
            ]);
            
            // "User ".$username." is not found";

        }

    }

    public function check_username(Request $request){


        /***
         * Ways to decode json payload
            $request ->json()->get("field_name")
            or
            $data = request()->json()->all();
            $data['field_name'];
            or 
            json_decode($request->getContent(), true);
        */

        $data =  $request->all();
        $username = $data['username'];
        
        $exist = DB::table('accounts')
                    ->where('username',$username)
                    ->exists();
        if ($exist){
            $username = true;
        }else{
            $username = false;
        }

        return json_encode($username) ;
    }

    public function update(Request $request){
        $request->validate([
            // 'name' => 'required',
            'username'=> 'sometimes',
            'name' => 'sometimes',
            'calories' => 'sometimes'
        ]);

        // dd($request->session()->get('user_id'));
        DB::update("update accounts set name=? ,username=?, target_calories=? where id=?",[
            $request->input("name"),
            $request->input("username"),
            $request->input("calories"),
            $request->session()->get('user_id', $request->input("name"))
        ]);

        // update user
        $request->session()->put('user', $request->input("name"));

        // return redirect()->route("update.account",['update' => false ]);
        return view("account/update",[
            'update' => false
        ]);
    }

    public function retrieve_account(Request $request){
        $id = $request->session()->get("user_id");
        $user = DB::select("select username,name,target_calories from accounts where id=?",[$id]);
        $res = $user[0];
        return view("account/update",[
            'username' => $res->username,
            'name' =>  $res->name,
            'target_calories' => $res->target_calories,
            'update'=> true
        ]);

        // return "user id >> ".$id;
    }

    public function show_profile(Request $request){
        $id = $request->session()->get("user_id");
        $user = DB::select("select username,name,password from accounts where id=?",[$id]);
        $res = $user[0];
        return view("account/profile",[
            'username' => $res->username,
            'name' =>  $res->name,
            'password' => $res->password
        ]);
    }
}
