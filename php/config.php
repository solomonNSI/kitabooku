<?php

$db = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr','g.keskinkilic','iwliDXMQ','g_keskinkilic');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully";
?>
