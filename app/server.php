<?php

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
  $products = Products::findAll();
  View::render("products", $products);
});


$app->get("/products/new", authenticate(), function($request) {
  View::render("product-new");
});


$app->get("/products/:id", authenticate(), function($request) {
  $product = Products::findById($request["params"]["id"]);
  View::render("product", $product);
});


$app->post("/products", authenticate(), function($request) {
  $product_id = Products::create(
    array(
      "title" => $_POST["title"],
      "description" => $_POST["description"],
      "price" => (float) $_POST["price"]     
    )
  );

  redirect("/products/" . $product_id);
});


$app->get("/products/:id/edit", authenticate(), function($request) {
  $product = Products::findById($request["params"]["id"]);
  View::render("product-edit", $product);
});


$app->put("/products/:id/edit", authenticate(), function() {
  $product = Products::updateById($request["params"]["id"], array(
    "title" => $_POST["title"],
    "description" => $_POST["description"],
    "price" => (float) $_POST["price"]
  ));

  redirect("/products/" . request["params"]["id"]);
});


$app->delete("/products/:id", authenticate(), function() {
  $product = Products::deleteById();
  redirect("/products");
});


$app->get("/api/products", function() {
  $products = Products::findAll();
  View::json($products);
});

$app->get("/api/products/:id", authenticate() , function($request) {
  $product = Products::findById($request["params"]["id"]);
  View::json($product);
});
