<div class="bg-[#043927] text-white py-16 px-4 lg:px-0">
    <div class="lg:grid lg:grid-cols-3 w-full lg:w-[1200px] lg:m-auto font-mon gap-x-16">
        <div>
            <div class="text-2xl font-semibold pb-8">Progams</div>


            <?php
            $sp3 = "SELECT * FROM services_and_programs WHERE category_list = 'Program'";
            $sp_result = $db->query($sp3);
            if ($sp_result->num_rows >= 0) {
                while ($sp_data = $sp_result->fetch_assoc()) {
                    $sp_id = $sp_data['sp_id'];
                    $sp_name = $sp_data['sp_name'];
                    ?>
                    <div class="cursor-pointer flex items-center gap-2" onclick="location.href='/services_and_programs_details.php?spid=<?php echo $sp_id; ?>'">
                        <div class="h-2 w-2 rounded-full bg-gray-200"></div>
                        <div><?php echo $sp_name; ?></div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <div>
            <div>
                <div class="text-2xl font-semibold pb-8 pt-8 lg:pt-0">Contact Information</div>
                <?php
                if (empty($phone_1)) {
                    echo '';
                } else {
                    ?>
                    <a href="call:<?php echo $phone_1; ?>" class="flex items-center gap-2">
                        <span class="icon-[ic--baseline-phone]" style="width: 24px; height: 24px;"></span>
                        <span>
                            <?php echo $phone_1; ?>
                        </span>
                    </a>
                    <?php
                }

                if (empty($phone_2)) {
                    echo '';
                } else {
                    ?>
                    <a href="call:<?php echo $phone_2; ?>" class="flex items-center gap-2 pb-4">
                        <span class="icon-[material-symbols--deskphone]" style="width: 24px; height: 24px;"></span>
                        <span>
                            <?php echo $phone_2; ?>
                        </span>
                    </a>
                    <?php
                }
                if (empty($email_address)) {
                    echo '';
                } else {
                    ?>
                    <a href="mailto:<?php echo $email_address; ?>" class="flex items-center gap-2 pb-4">
                        <span class="icon-[ic--baseline-email]" style="width: 24px; height: 24px;"></span>
                        <span>
                            <?php echo $email_address; ?>
                        </span>
                    </a>
                    <?php
                }
                ?>
                <div class="flex items-center gap-x-4">
                    <?php
                    if (empty($telegram)) {
                        echo '';
                    } else {
                        ?>
                        <a alt="Telegram" href="https://t.me/<?php echo $telegram; ?>" class="text-[#0088cc]">
                            <span class="icon-[ic--baseline-telegram]" style="width: 48px; height: 48px;"></span>
                        </a>
                        <?php
                    }
                    if (empty($whatsapp)) {
                        echo '';
                    } else {
                        ?>
                        <a alt="WhatsApp" href="tel:<?php echo $whatsapp; ?>" class="text-[#25D366]">
                            <span class="icon-[ic--baseline-whatsapp]" style="width: 48px; height: 48px;"></span>
                        </a>
                        <?php
                    }
                    if (empty($wechat)) {
                        echo '';
                    } else {
                        ?>
                        <a alt="WeChat" href="weixin://dl/chat?{<?php echo $wechat; ?>}" class="text-[#2f8819]">
                            <span class="icon-[ic--baseline-wechat]" style="width: 60px; height: 60px;"></span>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div>
            <div>
                <div class="text-2xl font-semibold pb-8  pt-8 lg:pt-0">Follow us</div>
                <?php
                $full_address = $about_data['full_address'];
                if (empty($full_address)) {
                    echo '';
                } else {
                    ?>
                    <div class="flex gap-x-2 items-center">
                        <span class="icon-[mdi--location]" style="width: 24px; height: 24px;"></span>
                        <div class="p-0 m-0">
                            <?php echo $full_address; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="flex items-center gap-3 pt-8">
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
                            <span class="icon-[ic--baseline-tiktok]" style="width: 24px; height: 24px;"></span>
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
                            <span class="icon-[tabler--brand-tripadvisor]" style="width: 24px; height: 24px;"></span>
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

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-[#043927] text-center py-8 text-white font-rob text-sm border-t">
    <?php
    $year = date("Y");
    echo $year;
    ?>
    &copy;
    <?php echo $about_data['company_name']; ?>. All right Reserved.

</div>

<!-- move to top -->
<button type="button" onclick="topFunction()"
    class="inline-block w-12 h-12 bg-[#F56960] text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-[#0791BE] hover:shadow-lg focus:bg-mtp-2 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-mtp-1 active:shadow-lg transition duration-150 ease-in-out bottom-5 right-5"
    id="btn-back-to-top">
    <span class="icon-[mdi--arrow-up]" style="width: 24px; height: 24px;"></span>
</button>

<?php
$db->close();
?>
<script src="../sources/js/script.js"></script>
<script src="../sources/js/slideshow.js"></script>
<script src="../sources/js/slider.js"></script>
</body>

</html>