<?php

function authenticate() {
  return array(
    "auth" => function($req) {
      return $_SESSION["auth"] ? true : false;
    }
  ); 
}
