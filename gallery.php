<?php
include 'templates/header.php';
$about_highlight = $about_data['about_highlight'];
$short_description = $about_data['short_description'];
$about_description = $about_data['about_description'];
$start_year = $about_data['start_year'];
$about_image = $about_data['about_image'];
$sticky_banner_home = $about_data['sticky_banner_home'];
?>
<title>Gallery - <?php echo $company_name; ?>, Siem Reap, Cambodia</title>
</head>

<body class="w-full text-lg">
    <div class="text-white h-[600px] relative bg-[#0791BE]">
        <!-- main menu -->
        <?php
        include 'templates/top-bar.php';
        include 'templates/logo-menu.php';
        ?>
        <!-- end main menu -->
        <div class="w-full lg:w-[1200px] h-[600px] m-auto text-center">
            <div
                class="h-[600px] w-full flex flex-col items-center justify-center pb-16 lg:pb-56 px-4 lg:px-0 uppercase">
                <h1 class="text-4xl lg:text-6xl font-bold">Gallery</h1>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-[1200px] m-auto py-8 lg:py-16 px-4 lg:px-0">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php
            $image_types = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");
            $images = [];

            foreach ($image_types as $type) {
                $images = array_merge($images, glob("sources/images/gallery/*." . $type));
            }

            foreach ($images as $index => $image) {
                echo "<div class='gallery-item overflow-hidden rounded-lg shadow-lg'>";
                echo "<img src='" . $image . "' alt='Gallery Image' class='cursor-pointer w-full h-auto object-cover' data-index='" . $index . "' onclick='openPopup(" . $index . ")'>";
                echo "</div>";
            }
            ?>
        </div>

        ...
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
<script>
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

<!-- Footer -->
<?php include 'templates/footer.php' ?>
