<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
	protected $signature = 'admin:create {--name=} {--email=} {--password=}';

	public function handle()
	{
		$name = $this->option(key:'name');
		$email = $this->option(key:'email');
		$password = $this->option(key:'password');

		User::create([
			'name'    => $name,
			'email'   => $email,
			'password'=> bcrypt($password),
		]);
		$this->info('created user ' . ' email: ' . $email . ' name: ' . $name);
	}
}
