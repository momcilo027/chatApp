<?php

namespace App\Http\Controllers;

use auth;
use Session;
use App\Models\Msgs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    // Show_Page (SIGNUP)
    public function create(){
        return view('signup');
    }

    // Add User
    public function store(Request $request){
        $formFields = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required', 'min:4'],
            'email' => ['required', 'email'],
            'password' => 'required|confirmed',
        ]);

        // Hash PW
         $formFields['password'] = bcrypt($formFields['password']);

        //Create USER
        $user = User::create($formFields);

        return redirect('/login');
    }

    // Show_Page (LOGIN)
    public function login(){
        return view('login');
    }

    // Login User
    public function loginUser(Request $request){
        $validationFields = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if(auth()->attempt($validationFields)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    }

    // Logout User

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function startup(Request $request){
        if(auth()->user()){
            return view('users', [
                'users' => User::all(),
                'chatId' => $request->GET('chatWith'),
                'chatWith' => User::find($request->GET('chatWith')),
                'chatInfo' => Msgs::where([
                    ['sent_id', '=', auth()->user()->id],
                    ['rec_id', '=', $request->GET('chatWith')]
                ])->orWhere([
                    ['sent_id', '=', $request->GET('chatWith')],
                    ['rec_id', '=', auth()->user()->id]
                ])->orderBy('created_at', 'DESC')->get()
            ]);
        }else{
            return redirect('/login');
        }
    }
    public function edit($id){
        if(auth()->user()){
            return view('editprofile', [
                'userInfo' => User::find($id),
            ]);
        }else{
            return redirect('/login');
        }
    }

    public function update(Request $request, $id){
        if(auth()->user()){

            $formFields = $request->validate([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'username' => ['required', 'min:4'],
                'email' => ['required', 'email'],
                'password' => 'required',
            ]);
    
            // Hash PW
             $formFields['password'] = bcrypt($formFields['password']);

            $updateUser = User::find($id);
            $updateUser->update($formFields);

            return redirect('/');
        }else{
            return redirect('/login');
        }
    }

    public function destroy(Request $request, $id){
        if(auth()->user()){

            $deleteUser = User::find($id);
            $deleteUser->delete();

            return redirect('/login');
        }else{
            return redirect('/login');
        }
    }
}
