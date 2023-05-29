<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('index');
        }

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('index');
        }
        Session::flash('fail','Incorrect email or password');
        return redirect()->back();
    }
    public function adminRegister()
    {
        return view('auth.admin_register');
    }

    public function adminRegisterSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8',
        ]);
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->role = $request->input('role');
        $save =  $admin->save();

        if ($save === true) {
            $account = 'admin';
            Mail::send('message.email',  ['account' => $account], function ($email) use ($request) {
                $email->subject('create account admin successfully');
                $email->to($request->input('email')); // Thay đổi địa chỉ email nhận thông báo
            });
            Session::flash('success','create account admin successfully');
            return redirect()->back();
        } else {
           Session::flash('fail','create account admin fail, please try again later');
           return redirect()->back();
        }
    }
    public function userRegister()
    {
        return view('auth.user_register');
    }
    public function userRegisterSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:8',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $save =  $user->save();

        if ($save === true) {
            $account = 'user';
            Mail::send('message.email', ['account' => $account], function ($email) use ($request) {
                $email->subject('create account successfully');
                $email->to($request->input('email'));
            });
            Session::flash('success','create account user successfully');
            return redirect()->back();
        } else {
            Session::flash('fail','create account user fail, please try again later');
            return redirect()->back();
        }
    }
    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect('/login');
    }
}
