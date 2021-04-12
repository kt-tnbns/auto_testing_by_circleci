<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::find(auth()->user()->id);
        return view('user.index', compact('user'));
    }

    public function edit(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('user.edit', compact('user'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $validate = null;
            if(Auth::user()->email === $request->get('email')){
                $validate = $request->validate([
                    'name'=>['required','min:3'],
                    'email'=>['required','email']
                ]);
            }else{
                $validate = $request->validate([
                    'name'=>['required','min:3'],
                    'email'=>['required','email', 'unique:users']
                ]);
            }
            if($validate){
                $user->update([
                    'name'=>$request->get('name'),
                    'email'=>$request->get('email')
                ]);  
                return redirect()->back()->with('success','Profile info updated successfully!');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function passwordEdit(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('user.password');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function passwordUpdate(Request $request){
        $validate = $request->validate([
            'oldPassword'=>'required|min:7',
            'password'=>'required|min:7|required_with:password_confirmation'
        ]);
        $user = User::find(Auth::user()->id);
        if($user){
            if(Hash::check($request->get('oldPassword'), $user->password) && $validate){
                $user->password = Hash::make($request->get('password'));
                $user->save();
                return redirect()->back()->with('msg', 'Your password has been updated successfully!');
            }else{
                return redirect()->back()->with('error', 'The password you entered does not match your current password');
            }
        }
    }
}
