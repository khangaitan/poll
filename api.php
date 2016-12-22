<?php
  $conn = new mysqli('localhost', 'root', '123', 'poll');

  $id = $_POST['id'];
  $nid = $_POST['nomination_id'];

  $conn->query("UPDATE candidates SET nomination$nid=nomination$nid+1 WHERE id=$id");
