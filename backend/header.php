<?php
session_start();
if (!($_SESSION['loggedin'])) {
    header("Location: ../login");
    exit();
}
include '../database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sources/css/style-out.css">
    <link rel="stylesheet" href="../sources/css/front-custom.css">
    <link rel="icon" href="../sources/images/favicon.ico">