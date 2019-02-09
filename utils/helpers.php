<?php

function redirect($path) {
  header("Location: " . $path);
}

function validPassword($password) {
  return $password == "testtest123";
}

function isLoggedIn() {
  return $_SESSION["auth"] ? true : false;
}
