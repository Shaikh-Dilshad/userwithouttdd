<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('Users.create');
    }
    public function store(Request $req){

        
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->number;
        $user->save();
        return back()->withSuccess('the user is created');
        }

        public function list(){
       
            return view('Users.userlist' , ['list'=>User::get()]);
        }

        public function edit($id){
            $user = User::find($id);
            return view('Users.edit',['edit'=>$user]);
    
        }

        public function update(Request $req , $id){
            $user = User::find($id);
            $user->name = $req->name;
            $user->email = $req->email;
            $user->phone = $req->number;

             $redirect =  $user->save();
             if($redirect){
                
                return redirect()->route('Users.userlist')->withSuccess('the user is updated');
            }
        }
        public function destroy($id){
            $delete = User::find($id);
            $delete->delete();
            return back();
        }
    
}
