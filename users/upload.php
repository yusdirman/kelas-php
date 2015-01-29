<?php

include '../connection.php';
include '../session.php';
include '../header.php';

$error = array();

$query = sprintf("SELECT * FROM users WHERE id = %s", mysql_real_escape_string($_GET['id']));

$result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) == 0) {

  $error[] = "Data tidak wujud";

} else {

  if (isset($_POST['submit']) && $_FILES['photo']['size'] > 0) {

    $name = $_FILES['photo']['name'];
    $tmp  = $_FILES['photo']['tmp_name'];
    $size = $_FILES['photo']['size'];
    $type = $_FILES['photo']['type'];

    $data = file_get_contents($tmp);

    $query = sprintf("UPDATE users SET photo = '%s' WHERE id = '%s'",
                      mysql_real_escape_string($data),
                      mysql_real_escape_string($_GET['id']));

    mysql_query($query);

    if (mysql_affected_rows() > 0) {
      echo '<p><strong>';
      echo 'Data telah berjaya dikemaskini. ';
      echo 'Lihat <a href="/bengkel/users/show.php?id=' . $_GET['id'] . '">data</a>.';
      echo '</strong></p>';

    } else {

      echo '<p><strong>Data gagal dikemaskini atau tiada perubahan data</strong></p>';
    }

  }

?>

<h1>Upload Picture</h1>

<form name="user" method="post" enctype="multipart/form-data">
  <input type="file" name="photo" size="50">
  <input type="submit" name="submit" value="Upload">
</form>

<?php

}

?>

