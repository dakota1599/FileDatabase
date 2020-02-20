<?php

require "controllers/StaticPageController.php";

class Router{

	private $routes = [];

	//Constructor for setting up the routes.
	function __construct(array $routes){

		$this->Define($routes);
	}

	//This function defines the routes.
	public function Define(array $routes){

		$this->routes = $routes;
	}


	//Takes in the parsed uri, and the current request method, and checks to see if the uri path exists.
	//If it does, it directs to the controller which directs to the view.  Otherwise it goes to a 404 page.
	public function Direct($uri){

		if(array_key_exists(strtolower($uri), $this->routes)){

			return $this->toAction(...explode("@",$this->routes[$uri]));
		}else{
			return $this->toAction("StaticPageController", "not_found");
		}
	}


	protected function toAction($class, $method){
		$class = new $class();
		$class->$method();
	}

}

?>
