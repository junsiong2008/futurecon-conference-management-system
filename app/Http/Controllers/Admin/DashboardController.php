<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Helpers\LogActivity;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        LogActivity::addToLog('User Records Fetched');
        return view('admin.user')->with('users', $users);
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        LogActivity::addToLog('User Edit Page Accessed');
        return view('admin.user-edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        LogActivity::addToLog('User Data Updated');
        return redirect('/user')->with('status', 'User has been updated');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        LogActivity::addToLog('User Data Deleted');
        return redirect('/user')->with('status', 'User has been deleted');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        LogActivity::addToLog('User Data Stored');
        return redirect('/user')->with('status', 'User has been added.');
    }
}
