<?php include "./views/partials/header.php"; ?>

<h1 style="margin: 50px 0;">List of products</h1>

<hr />

<?php foreach($data as $key => $value): ?>
  <h3><a href="/products/<?php echo $value["id"] ?>"><?php echo $value["title"] ?></a></h3>
  <p><?php echo $value["description"] ?></p>
<?php endforeach; ?>

<?php include  "./views/partials/footer.php"; ?>
