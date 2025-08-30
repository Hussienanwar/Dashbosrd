<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{


    public function index()
    {
        if(auth()->user()->role!=1){
            return view('website.settings');
        }
        
        return view('dashboard.setting');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // 'password' => 'nullable|string|min:6|confirmed', // لو ضفت تغيير الباسورد
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // if($request->filled('password')){
        //     $user->password = Hash::make($request->password);
        // }

        $user->save();

        return redirect()->route('settings')->with('success', 'Account updated successfully!');
    }
}
