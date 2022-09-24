<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Catch_;

class ApiWrapper
{
	private $listOfCurrencies = null;

	//--api call skeleton--//

	public function apiCall(string $url,)
	{
		try {
			$response = Http::get($url);
			return $response->json();
		} catch (\Exception $e) {
			return $e->getMessage();
		}
	}

	//--generic api call filling--//

	public function getPrice($cryptoCurrency, $currency)
	{
		$pricePairUrl = sprintf("https://api.coinbase.com/v2/prices/%s-%s/spot", $cryptoCurrency, $currency);
		return $this->apiCall($pricePairUrl);
	}

	public function getList()
	{
		if (!$this->listOfCurrencies) {
			$this->listOfCurrencies = $this->apiCall("https://api.coingecko.com/api/v3/simple/supported_vs_currencies");
		}
		$list = $this->listOfCurrencies;

		return $list;
	}

	//--specific api interaction--//
}
