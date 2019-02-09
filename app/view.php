<?php

class View {
  public static function render($path, $data = array()) {
    include "./views/" . $path . ".view.php";
  }

  public static function json($data) {
    echo json_encode($data);
  }
}
