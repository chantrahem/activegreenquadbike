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
    <title>Gallery - <?php echo $company_name; ?>, Siem Reap, Cambodia</title>
    <style>
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /* Adjust as needed for your layout */
            gap: 10px;
            /* Spacing between gallery items */
        }

        .gallery-item {
            flex: 1 1 200px;
            /* Adjust basis to control item width */
            overflow: hidden;
            border-radius: 8px;
            /* Rounded corners */
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            /* Remove space below images */
            object-fit: cover;
            /* Ensure aspect ratios are maintained without distortion */
        }

        #popup.hidden {
            display: none;
            /* Ensures the popup is hidden when the hidden class is applied */
        }

        #popup:not(.hidden) {
            display: flex;
            /* Ensures the popup is displayed when the hidden class is not applied */
        }
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
                <h1 class="text-4xl lg:text-6xl font-bold uppercase">Gallery</h1>
                <!-- <span class="text-xl lg:text-3xl">Experience Jeep Angkor Adventure in Pictures</span> -->
            </div>
        </div>
    </div>

    <div class="w-full lg:w-[1200px] m-auto py-8 lg:py-16 px-4 lg:px-0">
        <div class="gallery-container">
            <?php
            $images = glob("sources/images/gallery/*.{jpg,png,gif,jpeg,JPG,PNG,GIF,JPEG}", GLOB_BRACE);
            if ($images) {
                foreach ($images as $index => $image) {
                    echo "<div class='gallery-item cursor-pointer'><img src='" . htmlspecialchars($image) . "' alt='Gallery Image' onclick='openPopup($index)'></div>";
                }
            }
            ?>
        </div>
    </div>


    <!-- Popup Modal -->
    <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 hidden z-50">
        <span class="absolute top-0 right-0 text-white text-5xl font-bold cursor-pointer p-4"
            onclick="closePopup()">&times;</span>
        <div class="relative">
            <img id="popup-img" class="max-w-full max-h-screen mx-auto">
            <a class="absolute top-1/2 left-0 transform -translate-y-1/2 text-white text-4xl font-bold p-4 cursor-pointer"
                onclick="changeImage(-1)">&#10094;</a>
            <a class="absolute top-1/2 right-0 transform -translate-y-1/2 text-white text-4xl font-bold p-4 cursor-pointer"
                onclick="changeImage(1)">&#10095;</a>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var grid = document.querySelector('.gallery-container');
            imagesLoaded(grid, function () {
                new Masonry(grid, {
                    itemSelector: '.gallery-item',
                    percentPosition: true
                });
            });
        });

        var images = <?php echo json_encode($images); ?>;
        var currentIndex = 0;

        function openPopup(index) {
            currentIndex = index;
            document.getElementById('popup-img').src = images[currentIndex];
            document.getElementById('popup').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }

        function changeImage(direction) {
            currentIndex += direction;
            if (currentIndex < 0) {
                currentIndex = images.length - 1;
            } else if (currentIndex >= images.length) {
                currentIndex = 0;
            }
            document.getElementById('popup-img').src = images[currentIndex];
        }
    </script>


    <?php include 'templates/footer.php'; ?>