<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use DB;
use App\Models\User;
use Carbon\Carbon;

class CubeDataImport extends Command 
{
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cubeupload:dataimport';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Perform a database import from the v4 schema.';

	private $legacyDb;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->legacyDb = DB::connection('cube_v4');
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->showMenu();
	}

	public function showMenu()
	{
		$this->info('CubeUpload Data Import.');
		$this->info('1. Import Users');
		$this->info('2. Import Images');
		$this->info('8. Reset Database');
		$this->info('9. Cancel');
		$action = $this->ask('Choose an action above: ');

		switch( $action )
		{
			case 1:
				$this->importUsers();
				break;
			case 2:
				$this->importImages();
				break;

			case 8:
				$this->resetDatabase();
				break;

			case 9:
				return;
		}
		$this->showMenu();
	}

	public function importUsers()
	{
		$this->info('Importing users');
		DB::transaction( function(){

			$users = $this->legacyDb->table('users')->get();

			foreach( $users as $user )
			{
				$user = (array)$user;
				
				$newUser = new User;
				$newUser->name = $user['user_name'];
				$newUser->username = $user['user_name'];

				if( array_key_exists( 'user_email_address', $user ) )
					$newUser->email = $user['user_email_address'];
				else
					$newUser->email = '';

				$newUser->legacy_password = $user['user_password'];
				$newUser->legacy_user_id = $user['id'];
				$newUser->new_import = true;
				$newUser->registration_ip = $user['user_ip_address'];
				$newUser->created_at = Carbon::createFromTimeStamp( $user['user_reg_time']);
				$newUser->save();
			}
		});
		$this->info('Done.');
	}

	public function importImages()
	{
		$startCount = 0;
		$recordsPerCycle = 5000;

		if( $this->confirm('Do you want to continue from the previous row?'))
		{
			$startCount = DB::table('images')->orderBy('id', 'desc')->first()->id / 5000;
			$this->info('Starting from cycle #' . $startCount);			
		}


		$imageCount = $this->legacyDb->table('images')->count();
		$this->info('Total of ' . $imageCount . ' images to work with');

		DB::disableQueryLog();

		for( $i = $startCount; $i <= $imageCount; $i++ )
		{
			if( $i == 0 ) // first cycle
				$images = $this->legacyDb->table('images')->take( $recordsPerCycle)->orderBy('id')->get();
			else
				$images = $this->legacyDb->table('images')->skip( $i * $recordsPerCycle )->take($recordsPerCycle)->orderBy('id')->get();

			DB::transaction( function() use ($images) 
			{
				$imgArray = array();
				foreach( $images as $img )
				{
					$img = (array)$img;						
					$newImage = array();

					$newImage['id'] = $img['id'];
					$newImage['name'] = $img['file_name'];
					$newImage['size'] = $img['file_size'];
					$newImage['user_id'] = $img['user_id'];
					$newImage['uploader_ip'] = $img['uploader_ip'];
					$imgArray[] = $newImage;
				}
				DB::table('images')->insert( $imgArray );
				$imgArray = null;
			});
			$images = null;
		}
	}

	public function resetDatabase()
	{
		$this->call('migrate:reset');
		$this->call('migrate');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			//array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}
}
