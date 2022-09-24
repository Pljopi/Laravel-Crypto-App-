<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite as Favorite;

class FavoriteController extends Controller
{
	//---add, remove, parse, list table favorite ---//
	public function addFavorite($favoriteCurrency, $user_id)
	{
		//---add favorite currency to table favorite ---//
		foreach ($favoriteCurrency as $favorite) {
			Favorite::insertOrIgnore(['tag' => $favorite, 'user_id' => $user_id]);
			echo "1";
		}
	}

	public function removeFavorite($favoriteCurrency, $user_id)
	{
		//---remove favorite currency from table favorite ---//
		foreach ($favoriteCurrency as $favorite) {
			Favorite::where('tag', $favorite)->where('user_id', $user_id)->delete();
			echo "1";
		}
	}

	public function listFavorites($user_id)
	{
		//---list favorite currencies from table favorite ---//
		$favorites = Favorite::where('user_id', $user_id)->get();
		$favorites = $favorites->pluck('tag');
		return $favorites;
	}
}
