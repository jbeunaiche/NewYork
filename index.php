<?php
session_start();
require_once "vendor/autoload.php";

$class = "Julien\\Controllers\\" . (isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'IndexController');
$target = isset($_GET['t']) ? $_GET['t'] : "index";
$getParams = isset($_GET['params']) ? $_GET['params'] : null;
$postParams = isset($_POST['params']) ? $_POST['params'] : null;
$params = [
    "get" => $getParams,
    "post" => $postParams
];

if (class_exists($class, true)) {
    $class = new $class();
    if (in_array($target, get_class_methods($class))) {

        if ($params['get'] == null && $params['post'] != null)
            call_user_func_array([$class, $target], $postParams);
        else
            call_user_func_array([$class, $target], $params);
    } else {
        call_user_func([$class, "index"]);
    }
} else {
    header("Location: index.php?c=error&t=erreur");
}