<?php
include 'templates/header.php';
?>

<title>Thank you</title>
</head>

<body class="bg-gray-100">


        <div class="pb-8 flex items-center h-screen">
                <div class="w-[400px] m-auto">
                        <div class="flex justify-center mb-5">
                                <div
                                        class="flex items-center justify-center w-32 h-32 border rounded-full border-[#3A6732] text-[#3A6732]">
                                        <div><span class="icon-[mdi--tick]" style="width: 24px; height: 24px;"></span>
                                        </div>
                                </div>
                        </div>
                        <div class="text-center text-6xl">Thank you.</div>
                        <div class="text-center my-5 font-light">We received your inquiry, our teams will contact you
                                accordingly soon.</div>
                        <div class="text-center mt-8"><a
                                        class="bg-[#3A6732] hover:bg-[#0791BE] text-white py-2 px-8 rounded-sm"
                                        href="/">Return to
                                        Homepage</a>
                        </div>
                        <div class="flex items-center justify-center gap-2 text-[#3A6732] mt-8">
                                <?php
                                if (empty($facebook)) {
                                        echo "";
                                } else {
                                        ?>
                                        <a href="<?php echo $facebook ?>" target="_blank">
                                                <span class="icon-[mdi--facebook]" style="width: 24px; height: 24px;"></span>
                                        </a>
                                        <?php
                                }

                                if (empty($tiktok)) {
                                        echo "";
                                } else {
                                        ?>
                                        <a href="<?php echo $tiktok ?>" target="_blank">
                                                <span class="icon-[ic--baseline-tiktok]"
                                                        style="width: 24px; height: 24px;"></span>
                                        </a>
                                        <?php
                                }

                                if (empty($instagram)) {
                                        echo "";
                                } else {
                                        ?>
                                        <a href="<?php echo $instagram ?>" target="_blank">
                                                <span class="icon-[mdi--instagram]" style="width: 24px; height: 24px;"></span>
                                        </a>
                                        <?php
                                }

                                if (empty($linkedin)) {
                                        echo "";
                                } else {
                                        ?>
                                        <a href="<?php echo $linkedin ?>" target="_blank">
                                                <span class="icon-[mdi--linkedin]" style="width: 24px; height: 24px;"></span>
                                        </a>
                                        <?php
                                }
                                if (empty($tripadvisor)) {
                                        echo "";
                                } else {
                                        ?>
                                        <a href="<?php echo $tripadvisor ?>" target="_blank">
                                                <span class="icon-[tabler--brand-tripadvisor]"
                                                        style="width: 24px; height: 24px;"></span>
                                        </a>
                                        <?php
                                }

                                if (empty($google)) {
                                        echo "";
                                } else {
                                        ?>
                                        <a href="<?php echo $google ?>" target="_blank">
                                                <span class="icon-[mdi--google-plus]" style="width: 24px; height: 24px;"></span>
                                        </a>
                                        <?php
                                }
                                $db->close();
                                ?>
                        </div>
                </div>
        </div>