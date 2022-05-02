<?php

namespace App\Traits;

use App\Models\Category;

trait MainMenu
{
	public function mainMenu()
	{
		$main_menu = Category::first()->take(4)->get();
		return $main_menu;
	}

	public function fullMenu()
	{
		$full_menu = Category::all();
		return $full_menu;
	}
}