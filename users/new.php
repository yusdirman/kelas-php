<?php

include '../connection.php';
include '../session.php';
include '../header.php';

?>

<h1>Pendafataran Pengguna Baru</h1>

<?php

$error = array();

if ((is_array($_POST)) && (count($_POST) > 0)) {

  if (trim($_POST['name']) == '') {
    $error[] = 'Pastikan nama diisi';
  }

  if (trim($_POST['email']) == '') {
    $error[] = 'Pastikan email diisi';
  }

  if (trim($_POST['password']) == '') {
    $error[] = 'Pastikan kata laluan diisi';
  }

  if (trim($_POST['password_confirmation']) == '') {
    $error[] = 'Pastikan kata laluan pengesahan diisi';
  }

  if ((trim($_POST['password_confirmation'])) != (trim($_POST['password_confirmation'])))  {
    $error[] = 'Pastikan kata laluan yang sama diisi';
  }

  if (count($error) == 0) {
    $query = sprintf("INSERT INTO users
                      SET name = '%s',
                          email = '%s',
                          pass = SHA1('%s')",

                      mysql_real_escape_string($name),
                      mysql_real_escape_string($email),
                      mysql_real_escape_string($password));

    mysql_query($query);

    if (mysql_affected_rows() > 0) {
      echo '<p><strong>';
      echo 'Data telah berjaya dimasukkan. ';
      echo 'Lihat <a href="/bengkel/users/show.php?id=' . mysql_insert_id() . '">data</a>.';
      echo '</strong></p>';

      // Clear post supaya tidak dipaparkan balik dalam fields
      $_POST = array();

    } else {

      echo '<p><strong>Data gagal dimasukkan</strong></p>';
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

// Include the form
//
include 'form.php'

?>

<p>
  <a href="/bengkel/users/index.php">Senarai Pengguna</a>
</p>
