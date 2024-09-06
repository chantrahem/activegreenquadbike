<?php
include './database/connection.php';
//GETTING ABOUT & CONTACT
$about = "SELECT * FROM about";
$about_result = $db->query($about);
$about_data = $about_result->fetch_assoc();
$company_name = $about_data['company_name'];
$phone_1 = $about_data['phone_1'];
$phone_2 = $about_data['phone_2'];
$email_address = $about_data['email_address'];
$full_address = $about_data['full_address'];
$telegram = $about_data['telegram'];
$whatsapp = $about_data['whatsapp'];
$wechat = $about_data['wechat'];
$facebook = $about_data['facebook'];
$tiktok = $about_data['tiktok'];
$linkedin = $about_data['linkedin'];
$instagram = $about_data['instagram'];
$tripadvisor = $about_data['tripadvisor'];
$google = $about_data['google'];
$favicon = $about_data['favicon'];
$logo = $about_data['logo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sources/css/style-out.css">
    <link rel="stylesheet" href="./sources/css/front-custom.css">
    <link rel="icon" href="./sources/images/<?php echo $favicon; ?>">