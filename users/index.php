<?php

include '../connection.php';
include '../session.php';
include '../header.php';

?>

<h1>Senarai Pengguna</h1>

<strong><a href="/bengkel/users/new.php">Tambah Pengguna</a></strong>

<br><br>
<?php
$query = sprintf("SELECT * FROM users ORDER BY name");

// Perform Query
$result = mysql_query($query);

// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
    die(mysql_error());
}

// Use result
// Attempting to print $result won't allow access to information in the resource
// One of the mysql result functions must be used
// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
echo '<table border="1">';
echo '<thead>';
echo '<th>Bil</th>';
echo '<th>Name</th>';
echo '<th>Email</th>';
echo '<th>Action</th>';
echo '</thead>';

$i = 0;
while ($row = mysql_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . ++$i . '</td>';
    echo '<td>' . strtoupper($row['name']) . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>'
      . '<a href="/bengkel/users/show.php?id=' . $row['id'] . '">Show</a>'
      . ' / <a href="/bengkel/users/edit.php?id=' . $row['id'] . '">Edit</a>'
      . ' / <a href="/bengkel/users/upload.php?id=' . $row['id'] . '">Upload</a>'
      . ' / <a href="/bengkel/users/destroy.php?id=' . $row['id'] . '">Destroy</a>'
      . '</td>';
    echo '</tr>';
}
echo '</table>';
