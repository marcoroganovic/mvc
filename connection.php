<?php

function connect() {
    $info = 'sqlite:database.sqlite3';
    $connection = null;

    try {
      $connection = new PDO($info);
    } catch(PDOException $e) {
      print "Error Founds: ".$e->getMessage().PHP_EOL;
      die();
    }

    return $connection;
}

$db = connect(); 

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("CREATE TABLE IF NOT EXISTS products (
  id INTEGER PRIMARY KEY,
  name VARCHAR(250),
  description TEXT,
  price FLOAT,
  quantity INTEGER
)");

$db->exec("CREATE TABLE IF NOT EXISTS users (
  id INTEGER PRIMARY KEY,
  username VARCHAR(250),
  email VARCHAR(250)
)");
