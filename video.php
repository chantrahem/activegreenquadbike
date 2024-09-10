<?php
include 'templates/header.php';
$about_highlight = $about_data['about_highlight'];
$short_description = $about_data['short_description'];
$about_description = $about_data['about_description'];
$start_year = $about_data['start_year'];
$about_image = $about_data['about_image'];
$sticky_banner_home = $about_data['sticky_banner_home'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos - <?php echo $company_name; ?>, Siem Reap, Cambodia</title>
    <style>

    </style>


</head>

<body class="w-full text-lg">
    <div class="text-white h-[600px] relative bg-[#043927]">
        <!-- Main menu -->
        <?php include 'templates/top-bar.php'; ?>
        <?php include 'templates/logo-menu.php'; ?>
        <!-- End main menu -->
        <div class="w-full lg:w-[1141px] h-[600px] m-auto text-center">
            <div
                class="h-[600px] w-full lg:w-[600px] m-auto flex flex-col items-center justify-center pb-16 lg:pb-56 px-4 lg:px-0">
                <h1 class="text-4xl lg:text-6xl font-bold uppercase">Videos</h1>
                <span class="text-xl lg:text-3xl">Our activities videos</span>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-[1200px] m-auto py-8 lg:py-16 px-4 lg:px-0">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php
            // Query to fetch all videos from the database
            $sql = "SELECT youtube_link FROM video";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                // Output data for each video
                while ($row = $result->fetch_assoc()) {
                    $youtubeLink = $row['youtube_link'];

                    // Initialize $videoId to null
                    $videoId = null;

                    // Check if it's a full YouTube URL with 'v' parameter
                    if (strpos($youtubeLink, 'v=') !== false) {
                        parse_str(parse_url($youtubeLink, PHP_URL_QUERY), $queryParams);
                        if (isset($queryParams['v'])) {
                            $videoId = $queryParams['v'];
                        }
                    } elseif (strpos($youtubeLink, 'youtu.be/') !== false) {
                        // Handle shortened YouTube links like youtu.be/XXXX
                        $path = parse_url($youtubeLink, PHP_URL_PATH);
                        $videoId = substr($path, 1); // Get the ID part after '/'
                    }

                    // Display the video if a valid videoId is found
                    if ($videoId) {
                        echo "<div class='bg-white rounded-lg shadow-lg p-4'>
                    <iframe class='w-full h-60 rounded' src='https://www.youtube.com/embed/$videoId' frameborder='0' allowfullscreen></iframe>
                  </div>";
                    } else {
                        echo "<p class='text-center text-gray-600'>Invalid video link: $youtubeLink</p>";
                    }
                }
            } else {
                echo "<p class='text-center text-gray-600'>No videos found.</p>";
            }
            ?>

        </div>
    </div>
    <?php include 'templates/footer.php'; ?>