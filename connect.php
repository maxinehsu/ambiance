<?php

  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');

  if (!empty($username)) {
    if (!empty($password)) {
      $host = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "youtube";

      // create connection
      $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

      if (mysqli_connect_error()) {
        die('Connection error ('.mysqli_connect_errno().')'.mysqli_connect_error());
      } else {
        $sql = "INSERT INTO account (username, password) values ('$username', '$password')";
        if ($conn->query($sql)) {
          echo "New record was inserted successfully.";
        } else {
          echo "Error: ". $sql ."<br>".$conn->error;
        }
        $conn->close();
      }
    } else {
      echo "Please enter a password.";
      die();
    }
  } else {
    echo "Please enter a username.";
    die();
  }

?>