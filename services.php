<?php
include 'templates/header.php';
$about_highlight = $about_data['about_highlight'];
$short_description = $about_data['short_description'];
$about_description = $about_data['about_description'];
$start_year = $about_data['start_year'];
$about_image = $about_data['about_image'];
$sticky_banner_home = $about_data['sticky_banner_home'];
?>
<title>Services - <?php echo $company_name; ?>, Siem Reap, Cambodia</title>
</head>

<body class="w-full text-lg">
    <div class="text-white h-[600px] relative bg-[#0791BE]">
        <!-- main menu -->
        <?php
        include 'templates/top-bar.php';
        include 'templates/logo-menu.php';
        ?>
        <!-- end main menu -->
        <div class="w-full lg:w-[1141px] h-[600px] m-auto text-center">
            <div class="h-[600px] w-full flex flex-col items-center justify-center pb-16 lg:pb-56 px-4 lg:px-0 uppercase">
                <h1 class="text-4xl lg:text-6xl font-bold">Services</h1>
                <spa class="font-semibold text-4xl">What can we serve you?</spa>
            </div>
        </div>
    </div>
    <!-- Services -->
    <div class="bg-[#f4f4f4]">
        <div class="w-full lg:w-[1200px] m-0 lg:m-auto">
            <div class="flex items-center py-16">
                <div class="w-full">
                    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-8 lg:gap-4 px-8 lg:px-0">
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
                                            <h2 class="text-center text-xl font-semibold mb-4 uppercase"><?php echo $sp_name; ?>
                                            </h2>
                                            <p class="mb-8 text-center">
                                                <?php echo $sp_short_description; ?>
                                            </p>
                                        </div>
                                        <button
                                            onclick="location.href='/services_and_programs_details.php?id=<?php echo $sp_id; ?>'"
                                            class="absolute bottom-0 left-0 py-2 px-4 justify-center bg-[#3A6732] hover:bg-[#F56960] w-full rounded-b-md text-white text-sm uppercase">Read
                                            more...</button>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- break -->
    <div class="h-[600px]"
        style="background: url(sources/images/<?php echo $sticky_banner_home; ?>) no-repeat fixed center; background-size: cover;">
    </div>
    <!-- Footer -->
    <?php include 'templates/footer.php' ?>