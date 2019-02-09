<?php

class Session {
  public static function create() {
    $_SESSION["auth"] = true;
  }

  public static function destroy() {
    unset($_SESSION['auth']);
  }
}
