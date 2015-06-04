<?php namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CloudStorage extends Facade
{
	protected static function getFacadeAccessor() { return 'filesystem.cloud'; }
}
