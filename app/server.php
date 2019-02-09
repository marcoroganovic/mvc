<?php

$products = array(
  array("id" => 1, "title" => "Product Name #1", "description" => "Product description", "price" => 10),
  array("id" => 2, "title" => "Product Name #2", "description" => "Product description", "price" => 30),
);


$app = new Router();


$app->get("/", function() {
  View::render("home");
});


$app->get("/login", function() {
  View::render("login");
});


$app->post("/login", function() {
  $user = User::findByEmail($_POST["email"]);

  if(validPassword($_POST["password"])) {
    Session::create();
    redirect("/products");
  } else {
    redirect("/login");
  } 
});


$app->get("/logout", function() {
  Session::destroy();
  redirect("/");  
});


$app->get("/products", authenticate(), function($request) {
  global $products;
  View::render("products", $products);
});


$app->get("/products/:id", authenticate(), function($request) {
  global $products;
  $product = array_search(intval($request["params"]["id"]), array_column($products, 'id'));
  View::render("product", $product);
});


$app->post("/products", authenticate(), function() {
  $product = Products::create($_POST);
  redirect("/products/10");
});


$app->get("/products/:id/edit", authenticate(), function($request) {
  $product = Products::findById($request["params"]["id"]);
  View::render("product-edit", $product);
});


$app->put("/products/:id/edit", authenticate(), function() {
  $product = Products::updateById();
  redirect("/products/10");
});


$app->delete("/products/:id", authenticate(), function() {
  $product = Products::deleteById();
  redirect("/products");
});


$app->get("/api/products", authenticate(), function() {
  $products = array(
    array("title" => "Product Name #1", "description" => "Product description", "price" => 10),
    array("title" => "Product Name #2", "description" => "Product description", "price" => 30),
  );

  View::json($products);
});

$app->get("/api/products/:id", authenticate() , function() {
  $product = array("title" => "Product Name #1", "description" => "Product description", "price" => 10);
  View::json($product);
});
