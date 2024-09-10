<?php
include 'templates/header.php';
$spid = $_GET['spid'];
$about_highlight = $about_data['about_highlight'];
$short_description = $about_data['short_description'];
$about_description = $about_data['about_description'];
$start_year = $about_data['start_year'];
$about_image = $about_data['about_image'];
$sticky_banner_home = $about_data['sticky_banner_home'];
$sp = "SELECT * FROM services_and_programs WHERE sp_id = $spid";
$sp_result = $db->query($sp);
$sp_data = $sp_result->fetch_assoc();
$sp_banner = $sp_data['sp_banner'];
if (is_null($sp_banner) || $sp_banner == '') {
    $banner = 'no-image.png';
} else {
    $banner = $sp_banner;
}
$sp_name = $sp_data['sp_name'];
$sp_sub_name = $sp_data['sp_sub_name'];
$sp_price = $sp_data['sp_price'];
$sp_departure_time = $sp_data['sp_departure_time'];
$sp_description = $sp_data['sp_description'];
$sp_inclusion = $sp_data['sp_inclusion'];
$sp_notes = $sp_data['sp_notes'];
$sp_img_path = $sp_data['sp_gallery_image_path'];
$book_url = $sp_data['book_url'];
if (is_null($book_url) || $book_url == '') {
    $url = '/contact.php';
} else {
    $url = $book_url;
}
?>
<title><?php echo $sp_name; ?> - <?php echo $company_name; ?>, Siem Reap, Cambodia</title>
</head>

<body class="w-full text-lg">
    <div class="text-white h-screen lg:h-[800px]"
        style="background: #043927 url(sources/images/<?php echo $banner; ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
        <div class="relative h-screen lg:h-[800px]">
            <?php
            include 'templates/top-bar.php';
            include 'templates/logo-menu.php';
            ?>
            <div class="w-full absolute bottom-0 left-0 backdrop-blur-[2px] bg-white/30">
                <div class="w-full px-8 lg:px-0 uppercase py-4 lg:w-[1200px] m-0 lg:m-auto">
                    <h1 class="text-2xl lg:text-4xl font-bold text-black text-center lg:text-left">
                        <?php echo $sp_name; ?>
                    </h1>
                    <h2 class="text-xl lg:text-2xl font-semibold text-black  text-center lg:text-left">
                        <?php echo $sp_sub_name; ?>
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <div class="w-full lg:w-[1200px] m-0 lg:m-auto px-4 lg:px-0 py-8 lg:py-16">
        <div class="w-full lg:grid lg:grid-cols-5 lg:gap-8">
            <div class="lg:col-span-3">
                <div class="block lg:hidden">
                    <div class="flex flex-col lg:grid lg:grid-cols-2 gap-4 lg:gap-32">
                        <div class="price-list">
                            <h3 class="border-b font-semibold mb-4">Prices</h3>
                            <?php echo $sp_price; ?>
                        </div>
                        <div class="departure-time">
                            <h3 class="border-b font-semibold mb-4">Departure Times</h3>
                            <?php echo $sp_departure_time; ?>
                        </div>
                    </div>
                    <h3 class="border-b font-semibold mt-8 mb-4">Description</h3>
                </div>
                <div class="sp_description text-justify">
                    <?php echo $sp_description; ?>
                </div>
                <h3 class="border-b font-semibold mt-8 mb-4">Inclusion</h3>
                <div class="price-list">
                    <?php echo $sp_inclusion ?>
                </div>
                <h3 class="border-b font-semibold mt-8 mb-4">Terms and Conditions</h3>
                <div class="price-list pb-8">
                    <?php echo $sp_notes; ?>
                </div>

            </div>
            <div class="lg:border-l px-0 lg:px-8 lg:col-span-2">
                <div class="hidden lg:block">
                    <div class="price-list">
                        <h3 class="border-b font-semibold mb-4">Prices</h3>
                        <?php echo $sp_price; ?>
                    </div>
                    <div class="price-list mt-8">
                        <h3 class="border-b font-semibold mb-4">Departure Times</h3>
                        <?php echo $sp_departure_time; ?>
                    </div>
                </div>
                <button onclick="location.href='<?php echo $url ?>'"
                    class="w-full lg:w-auto bg-[#396731] hover:bg-[#e63619] rounded-full mt-8 text-sm text-white py-2 px-8">
                    Book Now</button>
            </div>
        </div>
        <div class="w-full pt-16">
            <h3 class="font-semibold mb-4">Photos</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-4">
                <?php
                $image_types = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");
                $images = [];

                foreach ($image_types as $type) {
                    $images = array_merge($images, glob("sp_gallery/" . rtrim($sp_img_path, '/') . "/*." . $type));
                }

                foreach ($images as $index => $image) {
                    echo "<div class='gallery-item overflow-hidden rounded-lg shadow-lg'>";
                    echo "<img src='" . $image . "' alt='Gallery Image' class='cursor-pointer w-full h-auto object-cover' data-index='" . $index . "' onclick='openPopup(" . $index . ")'>";
                    echo "</div>";
                }
                ?>
            </div>

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