<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 18/04/2017
 * Time: 17:56
 */

namespace Itb\Controller;

class RouteCollection
{
    private $routeObjects;

    public function __construct($routes)
    {
        $this->routeObjects = [];
        foreach ($routes as $routeName => $routeArray) {
            $routeObject = new Route($routeName, $routeArray);
            $this->routeObjects[] = $routeObject;
        }
    }

    /**
     * @return array
     */
    public function getRouteObjects(): array
    {
        return $this->routeObjects;
    }
}