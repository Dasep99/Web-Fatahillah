<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
  public function index()
  {
    return view('admin.auth.register');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
        'name' => 'required||max:255|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:5|max:50'
    ]);

    $validated['password'] = Hash::make($validated['password']);

    User::create($validated);


    $request->session()->flash('success','Selamat Bergabung');

      return redirect()->route('useradmin.index');
  }
}
