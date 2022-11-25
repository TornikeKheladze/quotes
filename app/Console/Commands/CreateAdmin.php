<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
	protected $signature = 'admin:create';

	protected $description = 'creates new admin';

	public function handle()
	{
		$name = $this->ask(question:'name');
		$email = $this->ask(question:'email');
		$password = $this->secret(question:'password');

		User::create([
			'name'    => $name,
			'email'   => $email,
			'password'=> bcrypt($password),
		]);
		$this->info('created user ' . ' email: ' . $email . ' name: ' . $name);
	}
}
