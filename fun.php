<?php

function nwconnect($host = "localhost", $user = "root", $password = "", $db = "northwind")
{
  $conn = new mysqli($host, $user, $password, $db);
  if (!$conn)
    die("Failed : " . $conn->connect_error);
  return $conn;
}

?>