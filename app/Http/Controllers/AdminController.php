<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function index()
    {
        $users = User::orderBy('created_at', 'asc')->get(); 
        return view('dashboard.users', compact('users'));
    }

}
