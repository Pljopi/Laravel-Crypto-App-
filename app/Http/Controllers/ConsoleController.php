<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiWrapper as ApiWrapper;
use App\Http\Controllers\FavoriteController as FavoriteController;

class ConsoleController extends Controller
{

	//---methods used to validate user input before interacting with api or db---//

	public function pricePairValidation($cryptoCurrency, $currency)
	{
		$apiWrapper = new ApiWrapper();

		if ($this->isLenghtBetween($cryptoCurrency) && $this->isLenghtBetween($currency)) {
			$cryptoCurrency = strtolower($cryptoCurrency);
			$currency = strtolower($currency);
		} else {
			echo "Please enter a valid currency pair \na currency TAG cannot be shorter than 2 or longer than 5 charcters \nfor help use the crypto:help command \n";
			exit;
		}
		if ($currency === $cryptoCurrency) {
			echo "Please enter a valid currency pair \nthe currencies cannot be the same \nfor help use the crypto:help command \n";
			exit;
		}
		if (!$this->isCurrencyOnListOfSupported($currency) || !$this->isCurrencyOnListOfSupported($cryptoCurrency)) {
			echo ("The currency pair you have entered is not on the list of supported currencies\n");
			exit;
		} else {
			$price = $apiWrapper->getPrice($cryptoCurrency, $currency);
			return $price;
		}
	}

	public function isLenghtBetween(string $str, int $min = 2, int $max = 5): bool
	{
		if (strlen($str) >= $min && strlen($str) <= $max) {
			return true;
		}
		return false;
	}

	public function isCurrencyOnListOfSupported($currency)
	{
		$apiWrapper = new ApiWrapper();
		$list = $apiWrapper->getList();
		return array_search($currency, $list, true) !== false;
	}

	public function checkTags($currencyTag)
	{
		if (empty($currencyTag) && $currencyTag !== '0') {
			echo "For this to work you have to enter a currency code, try again.\n";
			exit;
		} else {
			return explode(",", str_replace(" ", "", ($currencyTag)));
		}
	}


	public function parseTags($currencyTag)
	{
		$apiWrapper = new ApiWrapper();
		$list = $apiWrapper->getList();

		foreach ($currencyTag as $value) {
			//    var_dump($value);
			if (in_array($value, $list)) {
				$favs[] = $value;
			} else {
				$fail[] = $value;
			}
		}
		if (!empty($fail)) {
			echo "The following currencie TAG/s do not exist:\n";
			foreach ($fail as $value) {
				echo $value . "\n";
			}
		}
		if (!empty($favs)) {
			return array_unique($favs);
		}
		if (empty($favs)) {
			echo " You have not entered any valid currency codes, exiting...\n";
			exit;
		}
	}


	//---methods that return needed values from api to the console commands---//

	public function getPrice($criptoCurrency, $currency)
	{
		$price = $this->pricePairValidation($criptoCurrency, $currency);
		try {
			$price = [
				$price["data"]["base"],
				$price["data"]["amount"],
				$price["data"]["currency"],
			];
		} catch (\Exception $e) {
			echo "Please enter a valid currency pair \nfor help use the crypto:help command \n";
			exit;
		}
		return [$price[0], $price[1], $price[2]];
	}

	//---methods that manipulate the favorite table---//

	public function addFavorite($favorite)
	{
		//---user_id 3 is used to identify favorites added from the console---//

		$user_id = 3;
		$fav = new FavoriteController();
		foreach ($favorite as $value) {
			$fav->addToFavorite($value, $user_id);
		}
	}

	public function removeFavorite($favorite)
	{
		$user_id = 3;
		$fav = new FavoriteController();
		foreach ($favorite as $value) {
			$fav->removeFavorite($value, $user_id);
		}
	}

	public function listFavorites($user_id)
	{
		$fav = new FavoriteController();

		$list = $fav->listFavorites($user_id);
		return $list;
	}
}
