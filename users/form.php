<form name="user" method="post">
  <?php

  if ((isset($id)) && ($id != null)) {
    echo '<input name="id" type="hidden" value="' . $id . '">';
  }

  ?>

  Name: <input name="name" type="text" value="<?php echo $name ?>">
  <br><br>
  Email: <input name="email" type="text" value="<?php echo $email ?>">
  <br><br>

  <?php
  if (!isset($id)) {
  ?>
  Password: <input name="password" type="password">
  <br><br>
  Password (Sekali lagi): <input name="password_confirmation" type="password">
  <br><br>

  <?php
  }
  ?>

  <input name="submit" type="submit" value="Submit">
</form>
