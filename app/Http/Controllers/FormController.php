<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FormController extends Controller
{
    public function create():View
	{
		return view('createUser');
	}
	
	public function store(Request $request): RedirectResponse
	{
		$validateData = $request->validate([
				'name' =>'required',
				'password' => 'required|min:5',
				'email' => 'required|email|unique:users'
			], [
				'name.required' => 'Name field is required.',
				'password.required' => 'Password field is required.',
				'email.required' => 'Email field is required.',
				'email.email' => 'Email field must be email address.'
			]);
		
		$validateData['password'] = bcrypt($validateData['password']);
		$user = User::create($validateData);
		return back()->with('success','User created successfully.');
	}
}
