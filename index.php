<?php
include 'templates/header.php';
$about_highlight = $about_data['about_highlight'];
$short_description = $about_data['short_description'];
$about_description = $about_data['about_description'];
$start_year = $about_data['start_year'];
$about_image = $about_data['about_image'];
$sticky_banner_home = $about_data['sticky_banner_home'];
$quad_image = $about_data['sp_image'];
if (is_null($quad_image) || $quad_image == '') {
    $image_quad = 'no-image.png';
} else {
    $image_quad = $quad_image;
}
$quad_name  = $about_data['sp_name'];
$quad_description = $about_data['sp_description'];
?>
<title><?php echo $company_name; ?>, Siem Reap, Cambodia</title>
<style>
    /* Full-width container */
    .slider-container {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }

    /* Full-width images */
    .slider-container .slide_img {
        width: 100%;
        height: 100%;
        position: absolute;
        object-fit: cover;
        opacity: 0;
        transition: opacity 2s;
        z-index: -1;
    }

    /* Active image */
    .slider-container .slide_img.active {
        opacity: 1;
        z-index: -1;
    }
</style>
</head>

<body class="w-full text-lg">
    <div class="slider-container text-white">
        <?php
        // Path to images folder
        $imagesFolder = 'slider_images/';
        $images = glob($imagesFolder . '*.{jpg,jpeg,png,gif,JPG,PNG,GIF,JPEG}', GLOB_BRACE);

        // Output images in the folder
        foreach ($images as $index => $image) {
            echo '<img src="' . $image . '" class="slide_img ' . ($index == 0 ? 'active' : '') . '">';
        }
        ?>
    </div>
    <?php
    include 'templates/banner.php';
    ?>
    <!-- About -->
    <div>
        <div class="w-full lg:w-[1200px] m-auto">
            <div class="flex items-center py-16 px-4 lg:px-0">
                <div class="lg:grid lg:grid-cols-2 lg:gap-16">
                    <div>
                        <div class="flex items-center gap-2 justify-center lg:justify-start">
                            <div class="w-16 h-[2px] bg-[#F56960] rounded-full">&nbsp;</div>
                            <h3 class="uppercase text-[#F56960] font-semibold text-sm">Since
                                <?php echo $start_year; ?>
                            </h3>
                        </div>
                        <h2 class="text-xl lg:text-2xl mb-8 uppercase font-semibold text-center lg:text-left">
                            <?php echo $company_name; ?>
                        </h2>
                        <p class="text-justify">
                            <?php echo $about_description; ?>
                        </p>
                    </div>
                    <div class="bg-no-repeat bg-center bg-cover border h-64 lg:h-auto mt-8 lg:mt-0"
                        style="background: #3A6732 url(sources/images/<?php echo $about_image; ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Services -->
    <div class="bg-[#F6F8FB]">
        <div class="w-full lg:w-[1200px] m-0 lg:m-auto">
            <div class="flex items-center py-16">
                <div class="w-full">
                    <div class="flex items-center gap-2 justify-center">
                        <div class="w-16 h-[2px] bg-[#F56960] rounded-full">&nbsp;</div>
                        <h3 class="uppercase text-[#F56960] font-semibold text-sm">Our Services</h3>
                    </div>
                    <div class="w-full uppercase font-semibold text-center text-2xl">What can serve you?
                    </div>
                    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-8 lg:gap-4 mt-8 px-4 lg:px-0">
                        <div class="flex justify-center  rounded-md shadow-lg">
                            <div class="h-full relative">
                                <div class="w-full h-[250px] rounded-t-md"
                                    style="background: #3A6732 url(sources/images/<?php echo $image_quad ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
                                </div>
                                <div class="p-8">
                                    <h2 class="text-center text-2xl font-semibold mb-4 uppercase"><?php echo $quad_name ?></h2>
                                    <p class="mb-8 text-center">
                                    <?php echo $quad_description ?>
                                    </p>

                                </div>
                                <button onclick="location.href='/programs.php'"
                                    class="absolute bottom-0 left-0 py-2 px-4 justify-center bg-[#3A6732] hover:bg-[#F56960] w-full rounded-b-md text-white text-sm uppercase">Read
                                    more...</button>
                            </div>
                        </div>
                        <?php
                        $sp = "SELECT * FROM services_and_programs WHERE category_list = 'Service' AND is_featured = 'Yes'";
                        $sp_result = $db->query($sp);
                        if ($sp_result->num_rows >= 0) {
                            while ($sp_data = $sp_result->fetch_assoc()) {
                                $sp_id = $sp_data['sp_id'];
                                $sp_banner = $sp_data['sp_banner'];
                                if (is_null($sp_banner) || $sp_banner == '') {
                                    $banner = 'no-image.png';
                                } else {
                                    $banner = $sp_banner;
                                }
                                $sp_name = $sp_data['sp_name'];
                                $sp_short_description = $sp_data['sp_short_description'];
                                ?>
                                <div class="flex justify-center  rounded-md shadow-lg">
                                    <div class="h-full relative">
                                        <div class="w-full h-[250px] rounded-t-md"
                                            style="background: #3A6732 url(sources/images/<?php echo $banner ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
                                        </div>
                                        <div class="p-8">
                                            <h2 class="text-center text-2xl font-semibold mb-4 uppercase">
                                                <?php echo $sp_name; ?>
                                            </h2>
                                            <p class="mb-8 text-center">
                                                <?php echo $sp_short_description; ?>
                                            </p>
                                        </div>
                                        <button
                                            onclick="location.href='/services_and_programs_details.php?spid=<?php echo $sp_id; ?>'"
                                            class="absolute bottom-0 left-0 py-2 px-4 justify-center bg-[#3A6732] hover:bg-[#F56960] w-full rounded-b-md text-white text-sm uppercase">Read
                                            more...</button>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div onclick="location.href='/services.php'"
                        class="mt-16 text-sm uppercase hover:cursor-pointer flex justify-center gap-1 italic">
                        <span>See More Services</span>
                        <span class="icon-[material-symbols-light--more-up]" style="width: 16px; height: 16px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- break -->
    <div class="h-[600px]"
        style="background: url(sources/images/<?php echo $sticky_banner_home; ?>) no-repeat fixed center; background-size: cover;">
    </div>
    <!-- Programs -->
    <div class="bg-[#f4f4f4]">


        <div class="flex items-center px-0 lg:px-16 py-16">
            <div class="w-full">
                <div class="flex items-center gap-2 justify-center">
                    <div class="w-16 h-[2px] bg-[#F56960] rounded-full">&nbsp;</div>
                    <h3 class="uppercase text-[#F56960] font-semibold text-sm">Our Popular Programs
                    </h3>
                </div>
                <div class="w-full uppercase font-semibold text-center text-2xl">Villages & Sunset Tours
                </div>
                <div class="flex flex-col lg:grid lg:grid-cols-2 gap-8 lg:gap-16 mt-8 px-4 lg:px-0">
                    <?php
                    $sp2 = "SELECT * FROM services_and_programs WHERE category_list = 'Program' AND is_featured = 'Yes'";
                    $sp_result = $db->query($sp2);
                    if ($sp_result->num_rows >= 0) {
                        while ($sp_data = $sp_result->fetch_assoc()) {
                            $sp_id = $sp_data['sp_id'];
                            $sp_banner = $sp_data['sp_banner'];
                            if (is_null($sp_banner) || $sp_banner == '') {
                                $banner = 'no-image.png';
                            } else {
                                $banner = $sp_banner;
                            }
                            $sp_name = $sp_data['sp_name'];
                            $sp_short_description = $sp_data['sp_short_description'];
                            ?>
                            <div class="flex flex-col lg:grid lg:grid-cols-2 rounded-md shadow-xl border">
                                <div class="w-full h-[250px] lg:h-[300px] rounded-t-md lg:rounded-tr-none lg:rounded-l-md"
                                    style="background: #3A6732 url(sources/images/<?php echo $banner ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
                                </div>
                                <div class="relative">
                                    <div class="p-8">
                                        <h2 class="text-2xl font-semibold mb-4 uppercase text-center lg:text-left">
                                            <?php echo $sp_name; ?>
                                        </h2>
                                        <p class="mb-8 text-center lg:text-justify">
                                            <?php echo $sp_short_description; ?>
                                        </p>
                                    </div>
                                    <button
                                        onclick="location.href='/services_and_programs_details.php?spid=<?php echo $sp_id; ?>'"
                                        class="w-full lg:w-auto absolute bottom-0 right-0 py-2 px-8 justify-end bg-[#3A6732] hover:bg-[#F56960] rounded-b-md lg:rounded-b-none lg:rounded-br-md text-white text-sm uppercase">Read
                                        more...</button>
                                </div>

                            </div>
                            <?php
                        }
                    }
                    if ($sp_result->num_rows == 0) {
                        echo 'There is no program feature available...';
                    }
                    ?>

                </div>
                <div onclick="location.href='/programs.php'"
                    class="mt-16 text-sm uppercase hover:cursor-pointer flex justify-center gap-1 italic">
                    <span>Explore More Programs</span>
                    <span class="icon-[material-symbols-light--more-up]" style="width: 16px; height: 16px;"></span>
                </div>
            </div>
        </div>


    </div>
    <!-- Footer -->
    <?php include 'templates/footer.php' ?>