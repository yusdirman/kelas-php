<?php

// Connect
$link = mysql_connect('127.0.0.1', 'root', '');

if (!$link) {
  die('Tidak boleh connect: ' . mysql_error());
}

// Select database
$db_selected = mysql_select_db('bengkel', $link);

if (!$db_selected) {
    die ('Tidak boleh guna: ' . mysql_error());
}
