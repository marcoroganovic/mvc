<?php

function array_any(array $array, callable $fn) {
  foreach ($array as $key => $value) {
    if($fn($key, $value)) {
      return $value;
    }
  }
  return null;
}

function mergeParams($keys, $values) {
  array_shift($values);
  $params = array();
  $i = 0;

  foreach($keys as $key => $val) {
    $params[$val["name"]] = $values[$i]; 
    $i += 1;
  }

  return $params;
}

class Router {
  private $routes = array();


  public function get($path = "", $middleware = array(), $cb = null) {
    $argsCount = func_num_args();

    $this->routes["GET"][$path] = array(
      "callback" => $argsCount == 2 ? $middleware : $cb,
      "middleware" => $argsCount == 3 ? $middleware : null
    );
  }

  public function post($path = "", $middleware = array(), $cb = null) {
    $argsCount = func_num_args();

    $this->routes["POST"][$path] = array(
      "callback" => $argsCount == 2 ? $middleware : $cb,
      "middleware" => $argsCount == 3 ? $middleware : null
    );
  }

  public function put($path = "", $middleware = array(), $cb = null) {
    $argsCount = func_num_args();

    $this->routes["PUT"][$path] = array(
      "callback" => $argsCount == 2 ? $middleware : $cb,
      "middleware" => $argsCount == 3 ? $middleware : null
    );
  }


  public function delete($path = "", $middleware = array(), $cb = null) {
    $argsCount = func_num_args();

    $this->routes["DELETE"][$path] = array(
      "callback" => $argsCount == 2 ? $middleware : $cb,
      "middleware" => $argsCount == 3 ? $middleware : null
    );
  }


  public function bootstrap($request) {
    $method = $request["REQUEST_METHOD"];
    $uri = $request["REQUEST_URI"];
    $routes = $this->routes["GET"];
    $match = null;

    foreach($routes as $key => $value) {
      $keys = [];
      $re = PathToRegexp::convert('' . $key . '', $keys, array( "strict" => false ));
      $matches = PathToRegexp::match($re, '' . $uri . '');
      if($matches) {
        $params = mergeParams($keys, $matches);
        $match = $value;
        break;
      }
    }

    $request["params"] = $params;

    if($match) {
      if($match["middleware"] != null) {
        foreach($match["middleware"] as $key => $value) {
          if($value($request)) {
            continue;
          } else {
            redirect("/login");
            return;
          }
        }
      }

      $match["callback"]($request);
    } else {
      echo "404 Not Found";
    }
  }
}
