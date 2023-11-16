<?php

namespace wfm;

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
            }
        }
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