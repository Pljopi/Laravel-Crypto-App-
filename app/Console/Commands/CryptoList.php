<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Services\ApiWrapper as ApiWrapper;

class CryptoList extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'crypto:list';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'List all supported currencies';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$apiWrapper = new ApiWrapper();
		$list = $apiWrapper->getList();
		$this->info("Supported currencies:");
		foreach ($list as $currency) {
			$this->info($currency);
		}

		return 0;
	}
}
