<?php
include 'templates/header.php';
$about_highlight = $about_data['about_highlight'];
$short_description = $about_data['short_description'];
$about_description = $about_data['about_description'];
$start_year = $about_data['start_year'];
$about_image = $about_data['about_image'];
$sticky_banner_home = $about_data['sticky_banner_home'];
?>
<title>Contact - <?php echo $company_name; ?>, Siem Reap, Cambodia</title>
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
                    Contact Us
                </h1>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-[900px] m-auto py-8 px-4 lg:px-0">
        <div class="flex gap-2 items-center">
            <div class="bg-[#F56960] px-8 h-[2px] rounded-full">&nbsp;</div>
            <div class="text-[#F56960] uppercase font-bold">Get In Touch</div>
        </div>
        <div class="text-2xl font-semibold uppercase pb-8">Contact us now to get more information
        </div>
        <form action="send-contact-form.php" method="post">
            <div class="mb-4"><input required class="w-full p-4 outline-none focus:outline-none border border-[#F56960]"
                    type="text" name="name" id="name" placeholder="Your Name*"></div>
            <div class="mb-4"><input required class="w-full p-4 outline-none focus:outline-none border border-[#F56960]"
                    type="email" name="email" id="email" placeholder="Your email*"></div>
            <div class="mb-4"><input required class="w-full p-4 outline-none focus:outline-none border border-[#F56960]"
                    type="text" name="subject" id="subject" placeholder="Subject*"></div>
            <div class="mb-4"><textarea required
                    class="w-full p-4 outline-none focus:outline-none border border-[#F56960]" name="message"
                    id="message" cols="30" rows="10" placeholder="Message*"></textarea>
            </div>
            <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-2 px-8 mt-4 uppercase w-full lg:w-auto" type="submit"
                name="contact-us">Submit Message</button>
        </form>
    </div>
    <!-- Footer -->
    <?php include 'templates/footer.php' ?>