<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ConsoleController as ConsoleController;

class Favorite extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'favorite:{action}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Add, list or remove a favorite currency pair';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$action = $this->argument('action');
		switch ($action) {
			case 'add':
				$this->add();
				break;
			case 'list':
				$this->list();
				break;
			case 'remove':
				$this->remove();
				break;
			default:
				$this->error('Invalid action');
		}
	}

	private function add()
	{
		$console = new ConsoleController();
		$favorites = $this->ask('Enter the currency TAGs you want to add to your favourites, separated by a comma');
		$checkedTags = $console->checkTags($favorites);
		$parsedTags = $console->parseTags($checkedTags);
		$console->addFavorite($parsedTags);
		$this->info('Your new favorite currencies are: ' . implode(', ', $parsedTags));
	}

	private function list()
	{
		$console = new ConsoleController();
		$user_id = $this->ask('Enter the user id you want to get the favorites for');
		$favorites = $console->listFavorites($user_id);
		$arrayfavorites = $favorites->toArray();
		$this->info('Users favorites are: ' . implode(', ', $arrayfavorites));
	}

	private function remove()
	{
		$console = new ConsoleController();
		$favorites = $this->ask('Enter the currency TAGs you want to remove from your favourites, separated by a comma');
		$checkedTags = $console->checkTags($favorites);
		$parsedTags = $console->parseTags($checkedTags);
		$console->removeFavorite($parsedTags);
		$this->info('The following currencies have been removed from your favorite currencies ' . implode(', ', $parsedTags));
	}
}
