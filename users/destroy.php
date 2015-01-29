<?php

include '../connection.php';

if ((isset($_GET['id'])) && ($_GET['id'] != '')) {

  $query = sprintf("SELECT * FROM users WHERE id = %s", mysql_real_escape_string($_GET['id']));

  $result = mysql_query($query);

  if (mysql_num_rows($result) == 0) {

    die("Data tidak wujud");

  } else {

    $query = sprintf("DELETE FROM users WHERE id = %s", mysql_real_escape_string($_GET['id']));

    mysql_query($query);

    if (mysql_affected_rows() > 0) {
      echo '<p><strong>Data telah berjaya dipadam.</strong> ';
      echo 'Sila tunggu sebentar<p>';
      echo '<meta http-equiv="refresh" content="5;URL=http://localhost/bengkel/users/index.php">';
    }
  }
}

?>

