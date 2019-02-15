<?php


class Products {
  private static $products = array(
    "1" => array("title" => "Product Name #1", "description" => "Product description", "price" => 10),
    "2" => array("title" => "Product Name #2", "description" => "Product description", "price" => 30),
    "3" => array("title" => "Product Name #3", "description" => "Product description", "price" => 30),
    "4" => array("title" => "Product Name #4", "description" => "Product description", "price" => 30)
  );

  public static function create($data) {
    $new_id = count(self::$products) + 1;
    self::$products[$new_id] = $data; 
    return $new_id;
  }

  public static function findAll() {
    $products = self::$products;
    return $products;  
  }

  public static function findById($id) {
    $products = self::$products;
    return $products[$id] ? $products[$id] : null;
  }

  public static function updateById($id, $data) {
    $products = self::$products;
    $products[$id] = $data;
    return $id; 
  }

  public static function deleteById($id) {
    $products = self::$products;
    unset($products[$id]);
  }
}
