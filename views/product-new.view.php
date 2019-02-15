<?php include "./views/partials/header.php"; ?>

<div class="login-form">
  <h3>New Product</h3>

  <form method="POST" action="/products">
    <label for="title">Product title</label>
    <input name="title" class="u-full-width" type="text" placeholder="Product Title" id="title">

    <label for="description">Product description</label>
    <input name="description" class="u-full-width" type="text" placeholder="Product Description" id="description">

    <label for="price">Product price</label>
    <input name="price" class="u-full-width" type="text" placeholder="Product Description" id="price">


    <input class="button-primary" type="submit" value="Create">
  </form>
</div>

<?php include  "./views/partials/footer.php"; ?>
