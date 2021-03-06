<?php

	//These are the routes that are used by the site.
	$routes = [
		"" => "StaticPageController@home",
		"about" => "StaticPageController@about",
		"contact" => "StaticPageController@contact",
		"signup" => "AccountController@signup",
		"signin" => "AccountController@signin",
		"upload" => "FileController@upload",
		"profile" => "AccountController@profile",
		//The Following are routes that will return no page.  Asynchronous use only.
		"delete" => "FileController@delete",
		"verify" => "AccountController@verify",
		"signout" => "AccountController@signout",
		"updateinfo" => "AccountController@updateInfo",
		"exists" => "FileController@exists"

	];

?>