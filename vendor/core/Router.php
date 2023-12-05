<?php

namespace core;

class Router
{
    private $routes;

    public function getTrack($routes, $uri)
    {
        foreach($routes as $route)
        {
            $patterbn = $this->createPattern($route->path);
            if(preg_match($patterbn, $uri, $params))
            {
                $params = $this->clearParams($params);
                return new Track($route->controller, $route->action, $params);
            } else {
                throw new \Exception("Preg match dont work. Please check your routes.");
            }
        }
        return new Track('error', 'notFound');
    }

    private function createPattern($path)
    {
        return '#^' . preg_replace('#/:([^/]+)#', '/(?<$1>[^/]+)', $path) . '/?$#';
    }

    private function clearParams($params)
    {
        $result = [];

        foreach($params as $key => $param)
        {
            if(!is_int($key)) {
                $result[$key] = $param;
            }
        }
        return $result;
    }
}