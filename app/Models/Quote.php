<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
	use HasFactory;

	protected $fillable = [
		'quote',
		'movie_id',
		'thumbnail',
	];

	public function movie()
	{
		return $this->belongsTo(Movie::class, 'movie_id');
	}
}
