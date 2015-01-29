<?php

include '../connection.php';
include '../session.php';
include '../header.php';

if (isset($_GET)) {

  $query = sprintf("SELECT name, email FROM users
                    WHERE id = '%s'", mysql_real_escape_string($_GET['id']));

  $result = mysql_query($query) or die(mysql_error());

  if (mysql_num_rows($result) > 0) {

    while ($row = mysql_fetch_assoc($result)) {

        echo '<h1>Maklumat Pengguna</h1>';

        echo '<p>Name: ' . $row['name'] . '</p>';
        echo '<p>Email: ' . $row['email']. '</p>';

        echo '<p><a href="/bengkel/users/index.php">Senarai Pengguna</a></p>';
    }

  } else {

    echo '<p>Data tidak wujud</p>';
  }
}
