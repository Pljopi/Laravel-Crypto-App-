<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CryptoHelp extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'crypto:help';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$this->info("list of all commands: \n crypto:list \n crypto:price  \n crypto:favorite {add}, {remove}, {list}, \n crypto:help");
		return 0;
	}
}
