<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Http\Controllers\ConsoleController as ConsoleController;

class CryptoPrice extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'crypto:price';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Returns the price of the selected currency pair';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$console = new ConsoleController();
		$criptoCurrency = $this->ask('Enter the cripto currency you want to get the price for');
		$currency = $this->ask('Enter the currency you want to get the price in');
		list($cryptoCurrencyTAG, $pairValue, $currencyTAG) = $console->getPrice($criptoCurrency, $currency);
		$this->info("The price of $cryptoCurrencyTAG is $pairValue $currencyTAG \n");
	}
}
