<?php
// fetch_images.php

header('Content-Type: application/json');

// Database connection (update with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "activegreen";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $db->connect_error]));
}

$sql = "SELECT slide_image_path FROM slide";
$result = $db->query($sql);

$images = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $images[] = $row['slide_image_path'];
    }
}

$db->close();

echo json_encode($images);
?>
