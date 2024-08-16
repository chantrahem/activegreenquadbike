<!-- top menu -->
<div class="border-b border-b-gray-300 py-3 text-sm hidden lg:block">
    <div class="w-[1141px] m-auto flex items-center justify-between">
        <div class="flex items-center gap-6">
            <?php
            if (empty($phone_1)) {
                echo '';
            } else {
                ?>
                <a href="tel:<?php echo $phone_1; ?>" class="flex items-center gap-2">
                <span class="icon-[ic--baseline-phone]" style="width: 20px; height: 20px;"></span>
                    <span>
                        <?php echo $phone_1; ?>
                    </span></a>
                <?php
            }

            if (empty($email_address)) {
                echo '';
            } else {
                ?>
                <a href="mailto:<?php echo $email_address; ?>" class="flex items-center gap-2">
                    <span class="icon-[ic--baseline-email]" style="width: 20px; height: 20px;"></span>
                    <span>
                        <?php echo $email_address; ?>
                    </span></a>
                <?php
            }

            if (empty($full_address)) {
                echo '';
            } else {
                ?>
                <div class="flex items-center gap-2">
                    <span class="icon-[mdi--location]" style="width: 20px; height: 20px;"></span>
                    <span>
                        <?php echo $full_address; ?>
                    </span>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="flex items-center justify-end gap-3">

            <?php
            if (empty($facebook)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $facebook ?>" target="_blank"
                    class="flex items-center justify-center rounded-full w-8 h-8">
                    <span class="icon-[mdi--facebook]" style="width: 20px; height: 20px;"></span>
                </a>
                <?php
            }

            if (empty($tiktok)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $tiktok ?>" target="_blank"
                    class="flex items-center justify-center rounded-full w-8 h-8">
                    <span class="icon-[ic--baseline-tiktok]" style="width: 20px; height: 20px;"></span>
                </a>
                <?php
            }

            if (empty($instagram)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $instagram ?>" target="_blank"
                    class="flex items-center justify-center rounded-full w-8 h-8">
                    <span class="icon-[mdi--instagram]" style="width: 20px; height: 20px;"></span>
                </a>
                <?php
            }

            if (empty($linkedin)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $linkedin ?>" target="_blank"
                    class="flex items-center justify-center rounded-full w-8 h-8">
                    <span class="icon-[mdi--linkedin]" style="width: 20px; height: 20px;"></span>
                </a>
                <?php
            }
            if (empty($tripadvisor)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $tripadvisor ?>" target="_blank"
                    class="flex items-center justify-center rounded-full w-8 h-8">
                    <span class="icon-[tabler--brand-tripadvisor]" style="width: 20px; height: 20px;"></span>
                </a>
                <?php
            }

            if (empty($google)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $google ?>" target="_blank"
                    class="flex items-center justify-center rounded-full w-8 h-8">
                    <span class="icon-[mdi--google-plus]" style="width: 20px; height: 20px;"></span>
                </a>
                <?php
            }

            ?>
        </div>
    </div>
</div>