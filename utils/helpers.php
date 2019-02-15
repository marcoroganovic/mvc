<?php

function redirect($path) {
  header("Location: " . $path);
}

function validPassword($password) {
  return $password == "test";
}

function isLoggedIn() {
  return $_SESSION["auth"] ? true : false;
}
