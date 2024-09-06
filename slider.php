<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Slider</title>
    <style>
        /* Full-width container */
        .slider-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        /* Full-width images */
        .slider-container img {
            width: 100%;
            height: 100%;
            position: absolute;
            object-fit: cover;
            opacity: 0;
            transition: opacity 2s;
        }

        /* Active image */
        .slider-container img.active {
            opacity: 1;
        }
    </style>
</head>
<body>

<div class="slider-container">
    <?php
    // Path to images folder
    $imagesFolder = 'slider_images/';
    $images = glob($imagesFolder . '*.{jpg,jpeg,png,gif,JPG,PNG,GIF,JPEG}', GLOB_BRACE);

    // Output images in the folder
    foreach($images as $index => $image) {
        echo '<img src="' . $image . '" class="' . ($index == 0 ? 'active' : '') . '">';
    }
    ?>
    <div class="text-white text-6xl">TEST</div>
</div>

<script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.slider-container img');
    const totalImages = images.length;

    // Function to change images
    function changeImage() {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % totalImages;
        images[currentIndex].classList.add('active');
    }

    // Change image every 5 seconds
    setInterval(changeImage, 5000);
</script>

</body>
</html>
