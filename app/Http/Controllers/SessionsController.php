<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
	public function destroy()
	{
		auth()->logout();
		return redirect()->route('home', ['lang'=>app()->getLocale()]);
	}

	public function create($lang)
	{
		App::setLocale($lang);
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
		return redirect()->route('home', ['lang'=>app()->getLocale()]);
	}
}
