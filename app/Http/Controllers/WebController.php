<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite as Favorite;
use App\Services\ApiWrapper as ApiWrapper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FavoriteController as FavoriteController;
use \App\Http\Controllers\ConsoleController as ConsoleController;

class WebController extends Controller
{
	private $fav;
	public function __construct()
	{
		$this->fav = new FavoriteController();
	}



	//--- methods that deal with the web page ---//
	public function webRemoveFromFavorite(Request $request)
	{

		$favoriteCurrency =  $request->favorite;
		$user_id = $this->fav->checkUserId($request);
		$this->fav->removeFavorite($favoriteCurrency, $user_id);
		return redirect()->route('favorite');
	}

	public function webAddToFavorite(Request $request)
	{
		$user_id = $this->fav->checkUserId($request);
		$favoriteCurrency = $request->currency;
		$this->fav->addToFavorite($favoriteCurrency, $user_id);
		return redirect()->route('favorite/list');
	}

	public function webListFavorites(Request $request)
	{
		$user_id = $this->fav->checkUserId($request);
		$favorites = $this->fav->listFavorites($user_id);
		return view('pages.favorite', ['favorite' => $favorites]);
	}

	public function webListAllCurrencies()
	{

		$currency = $this->fav->listAll();
		return view('pages.listAllCurrencies', ['currency' => $currency]);
	}

	public function priceListAllCurrencies()
	{
		$currency = $this->fav->listAll();
		return view('pages.home', ['currency' => $currency]);
	}

	public function price(Request $request)
	{
		$console = new ConsoleController();
		$cryptoCurrency = $request->cryptoCurrency;
		$currency = $request->currency;
		list($cryptoCurrency, $price, $currency) = $console->getPrice($cryptoCurrency, $currency);
		return view('pages/price', ['price' => $price, 'cryptoCurrency' => $cryptoCurrency, 'currency' => $currency]);
	}
}
