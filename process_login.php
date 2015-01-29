<?php

include 'connection.php';

if ((isset($_POST['email'])) && (isset($_POST['password']))) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = sprintf("SELECT id, name FROM users
                    WHERE email = '%s' AND pass = SHA1('%s')",
                    mysql_real_escape_string($email),
                    mysql_real_escape_string($password));

  $result = mysql_query($query);

  if (!$result) {
    die(mysql_error());
  }

  $num_rows = mysql_num_rows($result);

  // Jika berjaya
  if ($num_rows > 0) {

    session_start();

    $_SESSION['id'] = mysql_result($result, 0, 0);
    $_SESSION['name'] = mysql_result($result, 0, 1);

    header('Location: users/index.php');

  } else {

    echo 'Salah kata laluan atau email. Sila tunggu sebentar...';
    echo '<meta http-equiv="refresh" content="5;URL=http://localhost/bengkel/index.php">';
  }
}

