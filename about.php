<?php
include 'templates/header.php';
$about_highlight = $about_data['about_highlight'];
$short_description = $about_data['short_description'];
$about_description = $about_data['about_description'];
$start_year = $about_data['start_year'];
$about_image = $about_data['about_image'];
$sticky_banner_home = $about_data['sticky_banner_home'];
?>
<title>About - <?php echo $company_name; ?>, Siem Reap, Cambodia</title>
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
            <div class="h-[600px] w-full flex items-center justify-center pb-16 lg:pb-56 px-4 lg:px-0">
                <h1 class="text-4xl lg:text-6xl font-bold uppercase mb-8">
                    About Us
                </h1>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-[1200px] m-auto">
        <div class="flex items-center py-16 px-8 lg:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16">
                <div>
                    <div class="flex items-center gap-2">
                        <div class="w-16 h-[2px] bg-[#F56960] rounded-full">&nbsp;</div>
                        <h3 class="uppercase text-[#F56960] font-semibold text-sm">Since
                            <?php echo $start_year; ?>
                        </h3>
                    </div>
                    <h2 class="text-xl lg:text-2xl mb-8 uppercase font-semibold">
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
    <!-- break -->
    <div class="h-[600px]"
        style="background: url(sources/images/<?php echo $sticky_banner_home; ?>) no-repeat fixed center; background-size: cover;">
    </div>
    <!-- Footer -->
    <?php include 'templates/footer.php' ?>