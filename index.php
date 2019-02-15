<?php

ini_set('session.cookie_lifetime', 30 * 60);
ini_set('session.gc_maxlifetime', 30 * 60);
session_start();

include "./utils/sessions.php";
include "./utils/helpers.php";
include "./utils/path-to-regex.php";
include "./app/router.php";
include "./app/view.php";
include "./connection.php";
include "./models/user.php";
include "./models/products.php";
include "./app/middlewares.php";
include "./app/server.php";

$app->bootstrap($_SERVER);
