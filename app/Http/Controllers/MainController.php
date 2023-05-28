<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
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
        $save = $user->save();

        if ($save === true) {
            Session::flash('success', 'create account user successfully');
            return redirect()->back();
        } else {
            Session::flash('fail', 'create account user fail, please try again later');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if (!empty($id)) {
            $user = User::find($id);
            return view('users.edit', compact('user'));
        } else {
            Session::flash('fails', 'Link not found');
            return redirect()->back();
        }
    }


    public function delete($id)
    {
        if (!empty($id)) {
            $delete = User::destroy($id);

            if ($delete) {
                Session::flash('success', 'Delete users successfully');
                return redirect()->back();
            } else {
                Session::flash('fail', 'Can not delete user, please try again');
                return redirect()->back();
            }
        } else {
            Session::flash('fails', 'Link not found');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User,email,' . $id,
            'password' => 'required|min:8',
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $save = $user->save();

        if ($save === true) {
            Session::flash('success', 'Edit account user successfully');
            return redirect()->back();
        } else {
            Session::flash('fail', 'Edit account user fail, please try again later');
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        if (!empty($id)) {
            $user = User::find($id);
            return view('users.detail', compact('user'));
        } else {
            Session::flash('fail', 'Link not found');
            return redirect()->back();
        }
    }
}
