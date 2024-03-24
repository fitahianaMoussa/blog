<?php

namespace Router;

use App\Exceptions\NotFoundException;

class Router{

    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get(string $path,string $action)
    {
        $this->routes['GET'][] = new Route($path,$action);
    }

    public function post(string $path,string $action)
    {
        $this->routes['POST'][] = new Route($path,$action);   
    }

    public function run()
    {
        // Initialize a variable to track whether any route was matched
        $route_matched = false;

        // Loop through all routes defined for the current HTTP method
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            // Check if the current route matches the requested URL
            if ($route->matches($this->url)) {
                // If a route is matched, execute it
                $route->execute();
                // Update the flag indicating that a route was matched
                $route_matched = true;
                // Exit the loop since we found a matching route
                break;
            }
        }

        // If no route was matched, send a 404 error
        if (!$route_matched) {
            header('HTTP/1.0 404 Not Found');
            throw new NotFoundException("La page demandée est introvable");
        }

        
    }
}
