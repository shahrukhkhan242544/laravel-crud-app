<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {   

        $roles =  Role::all();    
        return view('user.index', compact('roles'));
        
    }

    public function fetchusers()
    {
        //$users = User::all(); 
        $users = User::with('roles:id,name')->get();
        //$users = User::find(1)->roles;

        return response()->json([
            'users'=>$users,
        ]);
    }

    public function store(Request $request)
    {   
        
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191', 
            'email'=>'required|unique:users|email|max:191',
            'phone'=>'required|max:12|min:12',
            'role'=>'required',
            'profile'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            if(!empty($request->profile->extension())){
                $imageName = time().'.'.$request->profile->extension();  
                $request->profile->move(public_path('images'), $imageName);
            }else{
                $imageName = '';
            }

            $user = new User;
            $user->name = $request->input('name');
            $user->description = $request->input('description');
            $user->role_id = $request->input('role');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->profile_image = $imageName;

            if($user->save()){

                $roleArray      =       array(
                    "user_id"      =>         $user->id, 
                    "role_id"      =>          $request->role
                );
                $role           =       UserRole::create($roleArray);
                
                return response()->json([
                    'status'=>200,
                    'message'=>'User Added Successfully.'
                ]);
            }else{
                return response()->json([
                    'status'=>400,
                    'message'=>'somthing wrong at the creation time'
                ]);
            }
           
        }

    }
 
}
