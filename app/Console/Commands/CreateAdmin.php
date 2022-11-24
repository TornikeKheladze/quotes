<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
	protected $signature = 'admin:create {name} {email} {password}';

	protected $description = 'creates new admin arguments name email password 
								php artisan admin:create name email password';

	public function handle()
	{
		$name = $this->argument(key:'name');
		$email = $this->argument(key:'email');
		$password = $this->argument(key:'password');

		User::create([
			'name'    => $name,
			'email'   => $email,
			'password'=> bcrypt($password),
		]);
		$this->info('created user ' . ' email: ' . $email . ' name: ' . $name);
	}
}
