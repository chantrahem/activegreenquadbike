<?php
include 'templates/header.php';
$about_highlight = $about_data['about_highlight'];
$short_description = $about_data['short_description'];
$about_description = $about_data['about_description'];
$start_year = $about_data['start_year'];
$about_image = $about_data['about_image'];
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
                            <?php echo $about_highlight; ?></h1>
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
                                <h3 class="uppercase font-168 text-[#F56960] font-semibold text-sm">Since <?php echo $start_year; ?></h3>
                            </div>
                            <h2 class="text-xl lg:text-2xl mb-8 uppercase font-semibold font-168"><?php echo $company_name; ?></h2>
                            <p class="text-justify">
                                <?php echo $about_description; ?>
                            </p>
                        </div>
                        <div class="bg-no-repeat bg-center bg-cover border h-64 lg:h-auto mt-8 lg:mt-0" style="background-image: url(sources/images/<?php echo $about_image; ?>);">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services -->
    <div class="bg-[#F6F8FB]">
        <div class="w-[1200px] m-auto">
            <div class="flex items-center py-16">
                <div class="w-full">
                    <div class="w-full uppercase font-168 text-center">Our Services</div>
                    <div class="w-full uppercase font-168 font-semibold text-center text-4xl">What can we do for you?
                    </div>
                    <div class="grid grid-cols-3 gap-8 mt-8">
                        <div class="flex justify-center border border-gray-200 rounded-md shadow-sm">
                            <div>
                                <div class="w-full h-[200px] rounded-t-md bg-red-200"
                                    style="background: url(sources/images/quadbike.jpeg) no-repeat center left; background-size: cover;">
                                </div>
                                <div class="p-8">
                                    <div class="text-center text-2xl font-semibold mb-4">Quad Bike Tours</div>
                                    <div class="text-left">
                                        Explore Siem Reap's countryside on our Quad Bike Tours. Ride through villages,
                                        rice
                                        paddies, and serene landscapes. Interact with locals and witness stunning
                                        sunsets
                                        for an unforgettable adventure!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center border border-gray-200 rounded-md shadow-sm">
                            <div>
                                <div class="w-full h-[200px] rounded-t-md bg-red-200"
                                    style="background: url(sources/images/tuktuk.jpeg) no-repeat center left; background-size: cover;">
                                </div>
                                <div class="p-8">
                                    <div class="text-center text-2xl font-semibold mb-4">TukTuk Tours</div>
                                    <div class="">
                                        Discover Siem Reap's countryside on our TukTuk Tours. Ride through villages,
                                        rice
                                        fields, and rural landscapes. Interact with locals and immerse in Cambodia's
                                        beauty
                                        for a memorable experience!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center border border-gray-200 rounded-md shadow-sm">
                            <div>
                                <div class="w-full h-[200px] rounded-t-md bg-red-200"
                                    style="background: url(sources/images/jeep.jpg) no-repeat center left; background-size: cover;">
                                </div>
                                <div class="p-8">
                                    <div class="text-center text-2xl font-semibold mb-4">Jeep Tours</div>
                                    <div class="">
                                        Experience Siem Reap's rugged countryside on our Jeep Tours. Traverse off-road
                                        paths, rice fields, and villages. Interact with locals, discover hidden gems,
                                        and
                                        witness rural life for an unforgettable adventure!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-8 mt-8">
                        <div class="flex justify-center border border-gray-200 rounded-md shadow-sm">
                            <div>
                                <div class="w-full h-[200px] rounded-t-md bg-red-200"
                                    style="background: url(sources/images/sunset-bbq.jpg) no-repeat center left; background-size: cover;">
                                </div>
                                <div class="p-8">
                                    <div class="text-center text-2xl font-semibold mb-4">Sunset BBQ</div>
                                    <div class="">
                                        Experience a unique Sunset BBQ in the heart of rice fields. Delight in a
                                        delicious
                                        BBQ as the sun sets, creating a magical ambiance over the serene landscape.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center border border-gray-200 rounded-md shadow-sm">
                            <div>
                                <div class="w-full h-[200px] rounded-t-md bg-red-200"
                                    style="background: url(sources/images/sunset-coocktail.jpeg) no-repeat center left; background-size: cover;">
                                </div>
                                <div class="p-8">
                                    <div class="text-center text-2xl font-semibold mb-4">Sunset Cocktail</div>
                                    <div class="">
                                        Sip on a Sunset Cocktail amid serene rice fields. Enjoy the tranquil beauty as
                                        the
                                        sun sets, casting a golden glow over the lush landscape.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center border border-gray-200 rounded-md shadow-sm">
                            <div>
                                <div class="w-full h-[200px] rounded-t-md bg-red-200"
                                    style="background: url(sources/images/temple-tour.jpg) no-repeat center left; background-size: cover;">
                                </div>
                                <div class="p-8">
                                    <div class="text-center text-2xl font-semibold mb-4">Temple Tours</div>
                                    <div class="">
                                        Discover Cambodia's ancient wonders on our Temple Tours. Explore Angkor Wat,
                                        Bayon &
                                        more with expert guides. Immerse yourself in history!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- break -->
    <div class="h-[600px]"
        style="background: url(sources/images/break-saction.jpg) no-repeat fixed center; background-size: cover;">

    </div>
    <!-- Programs -->
    <div class="bg-[#f4f4f4]">
        <div class="w-[1200px] m-auto">

        </div>
    </div>
    <!-- Footer -->
    <?php include 'templates/footer.php' ?>