<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>App name</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css" type="text/css" />
    <style>
      body {
        background: black;
        color: #fff;
      }
      .login-form {
        width: 300px;
        margin: 0 auto;
        padding: 100px 0;
      }
  
      .container {
        max-width: 960px;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>

    <div class="container">
    <header>
        <nav>
        <?php if(isLoggedIn()): ?>
          <a href="/products">Admin</a>
          <a href="/logout">Logout</a>
        <?php endif; ?>

        <?php if(!isLoggedIn()): ?>
          <a href="/login">Login</a>
        <?php endif; ?>
        </nav>
    </header>

