<?php

include 'session.php';

session_destroy();


echo 'Logout berjaya. Sila tunggu sebentar...';
echo '<meta http-equiv="refresh" content="5;URL=http://localhost/bengkel/index.php">';

