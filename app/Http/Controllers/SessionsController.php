<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
	public function destroy()
	{
		auth()->logout();
		return redirect('/')->with('success', 'goodbye');
	}

	public function create()
	{
		return view('sessions.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'email'   => 'required',
			'password'=> 'required',
		]);
		if (!auth()->attempt($attributes))
		{
			throw ValidationException::withMessages(['email'=>'You provided cretentials are not valid']);
		}

		session()->regenerate();
		return redirect('/')->with('success', 'welcome back!');
	}
}
