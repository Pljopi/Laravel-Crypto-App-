<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite as Favorite;
use App\Services\ApiWrapper as ApiWrapper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
	//---generic methods---//

	public function addToFavorite($favoriteCurrency, $user_id)
	{
		//---add favorite currency to table favorite ---//

		Favorite::insertOrIgnore(['tag' => $favoriteCurrency, 'user_id' => $user_id]);
	}

	public function removeFavorite($favoriteCurrency, $user_id)
	{
		//---remove favorite currency from table favorite ---//


		Favorite::where('tag', $favoriteCurrency)->where('user_id', $user_id)->delete();
	}

	public function listFavorites($user_id)
	{
		//---list favorite currencies from table favorite ---//
		$favorites = Favorite::where('user_id', $user_id)->get();
		$favorites = $favorites->pluck('tag');
		return $favorites;
	}

	public function checkUserId()
	{
		//---check if user is logged in---//
		if (Auth::user()) {
			$user_id = Auth::user()->id;
			return $user_id;
		} else {
			$user_id = 3;
			return $user_id;
		}
	}
	public function listAll()
	{
		//---list all currencies from api ---//
		$api = new ApiWrapper();
		return $api->getList();
	}



	//--- methods that deal with the web page ---//
	public function webRemoveFromFavorite(Request $request)
	{

		$favoriteCurrency =  $request->favorite;
		$user_id = $this->checkUserId($request);
		$this->removeFavorite($favoriteCurrency, $user_id);
		return redirect()->route('favorite');
	}

	public function webAddToFavorite(Request $request)
	{
		$user_id = $this->checkUserId($request);
		$favoriteCurrency = $request->currency;
		$this->addToFavorite($favoriteCurrency, $user_id);
		return redirect()->route('favorite/list');
	}

	public function webListFavorites(Request $request)
	{
		$user_id = $this->checkUserId($request);
		$favorites = $this->listFavorites($user_id);
		return view('pages.favorite', ['favorite' => $favorites]);
	}

	public function webListAllCurrencies()
	{

		$currency = $this->listAll();
		return view('pages.listAllCurrencies', ['currency' => $currency]);
	}

	public function priceListAllCurrencies()
	{
		$currency = $this->listAll();
		return view('pages.home', ['currency' => $currency]);
	}
}
