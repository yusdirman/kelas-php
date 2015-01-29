<?php

include '../connection.php';
include '../session.php';
include '../header.php';

?>

<h1>Kemaskini Pengguna</h1>

<?php

if ((is_array($_POST)) && (count($_POST) > 0)) {

  $error = array();

  if (trim($_POST['name']) == '') {
    $error[] = 'Pastikan nama diisi';
  }

  if (trim($_POST['email']) == '') {
    $error[] = 'Pastikan email diisi';
  }

  $query = sprintf("SELECT * FROM users WHERE id = %s", mysql_real_escape_string($_POST['id']));

  $result = mysql_query($query);

  if (mysql_num_rows($result) == 0) {
    $error[] = "Data tidak wujud";
  }

  if (count($error) == 0) {
    $query = sprintf("UPDATE users
                      SET name = '%s',
                          email = '%s'
                      WHERE id = '%s'",

                      mysql_real_escape_string($_POST['name']),
                      mysql_real_escape_string($_POST['email']),
                      mysql_real_escape_string($_POST['id']));

    mysql_query($query);

    if (mysql_affected_rows() > 0) {
      echo '<p><strong>';
      echo 'Data telah berjaya dikemaskini. ';
      echo 'Lihat <a href="/bengkel/users/show.php?id=' . $_POST['id'] . '">data</a>.';
      echo '</strong></p>';

      // Clear post supaya tidak dipaparkan balik dalam fields
      $_POST = array();

    } else {

      echo '<p><strong>Data gagal dikemaskini atau tiada perubahan data</strong></p>';
    }

  } // count

}

if (count($error) > 0) {
  echo "Terdapat ralat:";

  echo '<ul>';
  for ($i=0; $i<count($error); $i++) {
    echo '<li>' . $error[$i] . '</li>';
  }
  echo '</ul>';
}


$name = '';
$email = '';
$id = '';

if ((isset($_GET)) && ($_GET['id'] != '')) {

  $id = $_GET['id'];

  $query = sprintf("SELECT * FROM users
                    WHERE id = '%s'", mysql_real_escape_string($id));

  $result = mysql_query($query) or die(mysql_error());

  if (mysql_num_rows($result) > 0) {

    while ($row = mysql_fetch_assoc($result)) {

      $name = $row['name'];
      $email = $row['email'];
      $id = $row['id'];
    }

    // Include the form
    //
    include 'form.php';

  } else {

    echo '<p>Data tidak wujud</p>';
  }
}


?>

<p>
  <a href="/bengkel/users/index.php">Senarai Pengguna</a>
</p>
