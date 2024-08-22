<?php
include 'templates/header.php';
$about_highlight = $about_data['about_highlight'];
$short_description = $about_data['short_description'];
$about_description = $about_data['about_description'];
$start_year = $about_data['start_year'];
$about_image = $about_data['about_image'];
$sticky_banner_home = $about_data['sticky_banner_home'];
?>
<title><?php echo $company_name; ?>, Siem Reap, Cambodia</title>
</head>

<body class="w-full text-lg">
    <div class="text-white h-screen relative">
        <div id="slideshow" class="slideshow">
            <!-- main menu -->
            <?php
            include 'templates/top-bar.php';
            include 'templates/logo-menu.php';
            ?>
            <!-- end main menu -->
            <div class="w-full lg:w-[1141px] h-screen m-auto">
                <div class="h-screen w-full lg:w-[900px] flex items-center pb-16 lg:pb-56 px-4 lg:px-0">
                    <div>
                        <h1 class="text-4xl lg:text-6xl font-bold uppercase mb-8 text-center lg:text-left">
                            <?php echo $about_highlight; ?>
                        </h1>
                        <p class="text-center lg:text-left"><?php echo $short_description; ?></p>
                        <div class="flex items-center mt-8 space-x-4  justify-center lg:justify-start">
                            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 text-sm">
                                <button class="btn-primary font-168">
                                    Programs</button>
                                <button class="btn-primary font-168">
                                    Gallery</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About -->
    <div>
        <div class="w-full lg:w-[1200px] m-auto">
            <div class="flex items-center py-16 px-8 lg:px-0">
                <div class="lg:grid lg:grid-cols-2 lg:gap-16">
                    <div>
                        <div class="flex items-center gap-2">
                            <div class="w-16 h-[2px] bg-[#F56960] rounded-full">&nbsp;</div>
                            <h3 class="uppercase font-168 text-[#F56960] font-semibold text-sm">Since
                                <?php echo $start_year; ?>
                            </h3>
                        </div>
                        <h2 class="text-xl lg:text-2xl mb-8 uppercase font-semibold font-168">
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
                        <h3 class="uppercase font-168 text-[#F56960] font-semibold text-sm">Our Services</h3>
                    </div>
                    <div class="w-full uppercase font-168 font-semibold text-center text-xl">What can serve you?
                    </div>
                    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-8 lg:gap-4 mt-8 px-8 lg:px-0">
                        <div class="flex justify-center  rounded-md shadow-lg">
                            <div class="h-full relative">
                                <div class="w-full h-[250px] rounded-t-md"
                                    style="background: #3A6732 url(sources/images/quadbike.jpeg); background-repeat: no-repeat; background-position: center; background-size: cover;">
                                </div>
                                <div class="p-8">
                                    <h2 class="text-center text-xl font-semibold mb-4 uppercase">Quad Bike Tours</h2>
                                    <p class="mb-8 text-center">
                                        Explore Siem Reap's countryside on our Quad Bike Tours. Ride through villages,
                                        rice
                                        paddies, and serene landscapes. Interact with locals and witness stunning
                                        sunsets
                                        for an unforgettable adventure!
                                    </p>
                                    
                                </div>
                                <button onclick="location.href='/program'"
                                        class="absolute bottom-0 left-0 py-2 px-4 justify-center bg-[#3A6732] hover:bg-[#F56960] w-full rounded-b-md text-white text-sm uppercase">Read
                                        more...</button>
                            </div>
                        </div>
                        <?php
                        $sp = "SELECT * FROM services_and_programs WHERE category_list = 'Services' AND is_featured = 'Yes'";
                        $sp_result = $db->query($sp);
                        if ($sp_result->num_rows >= 0) {
                            while ($sp_data = $sp_result->fetch_assoc()) {
                                $sp_id = $sp_data['sp_id'];
                                $sp_banner = $sp_data['sp_banner'];
                                if (is_null($sp_banner) || $sp_banner == ''){
                                    $banner = 'no-image.png';
                                }else{
                                    $banner = $sp_banner;
                                }
                                $sp_name = $sp_data['sp_name'];
                                $sp_short_description = $sp_data['sp_short_description'];
                                ?>
                                <div class="flex justify-center  rounded-md shadow-lg">
                                    <div class="h-full relative">
                                        <div class="w-full h-[250px] rounded-t-md"
                                            style="background: #3A6732 url(sources/images/<?php echo $banner?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
                                        </div>
                                        <div class="p-8">
                                            <h2 class="text-center text-xl font-semibold mb-4 uppercase"><?php echo $sp_name; ?>
                                            </h2>
                                            <p class="mb-8 text-center">
                                                <?php echo $sp_short_description; ?>
                                            </p>
                                        </div>
                                        <button onclick="location.href='/services?id=<?php echo $sp_id; ?>'"
                                                class="absolute bottom-0 left-0 py-2 px-4 justify-center bg-[#3A6732] hover:bg-[#F56960] w-full rounded-b-md text-white text-sm uppercase">Read
                                                more...</button>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div onclick="location.href='/services/'" class="mt-8 text-sm uppercase hover:cursor-pointer flex items-center justify-center">
                        <span>More Services</span>
                        <span class="icon-[material-symbols-light--more-up]" style="width: 20px; height: 20px;"></span>
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
        <div class="w-[1200px] m-auto">

        </div>
    </div>
    <!-- Footer -->
    <?php include 'templates/footer.php' ?>