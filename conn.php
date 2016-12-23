<?php
  $servername = "phpstack-1850-4828-194340.cloudwaysapps.com";
  $username = "sznszdskgy";
  $password = "tn6C3EeE9v";
  $database = "sznszdskgy";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
