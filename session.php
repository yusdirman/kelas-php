<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();

  if ($_SESSION['id'] == '') {
    header('Location: /bengkel/index.php');
  }
}
