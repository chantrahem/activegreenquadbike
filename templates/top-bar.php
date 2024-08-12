<!-- top menu -->
<div class="border-b border-b-gray-400 py-3 text-sm">
    <div class="w-[1141px] m-auto flex items-center justify-between">
        <div class="flex items-center gap-6">
            <?php
            $phone_1 = $info_data['phone_1'];
            $full_address = $info_data['full_address'];
            $email_address = $info_data['email_address'];
            if (empty($phone_1)) {
                echo '';
            } else {
                ?>
                <a href="tel:<?php echo $iphone_1; ?>" class="flex items-center gap-2"><i
                        class="fa-solid fa-phone"></i><span>
                        <?php echo $phone_1; ?>
                    </span></a>
                <?php
            }

            if (empty($email_address)) {
                echo '';
            } else {
                ?>
                <a href="mailto:<?php echo $email_address; ?>" class="flex items-center gap-2"><i
                        class="fa-solid fa-envelope"></i><span>
                        <?php echo $email_address; ?>
                    </span></a>
                <?php
            }

            if (empty($full_address)) {
                echo '';
            } else {
                ?>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-location-dot"></i>
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
            $facebook = $info_data['social_facebook'];
            $twitter = $info_data['social_twitter'];
            $linkedin = $info_data['social_linkedin'];
            $instagram = $info_data['social_instagram'];
            if (empty($facebook)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $facebook ?>" target="_blank"><i class="fa-brands fa-facebook-f fa-lg"></i></a>
                <?php
            }

            if (empty($twitter)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $twitter ?>" target="_blank"><i class="fa-brands fa-x-twitter fa-lg"></i></a>
                <?php
            }

            if (empty($instagram)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $instagram ?>" target="_blank"><i class="fa-brands fa-instagram fa-lg"></i></a>
                <?php
            }

            if (empty($linkedin)) {
                echo "";
            } else {
                ?>
                <a href="<?php echo $linkedin ?>" target="_blank"><i class="fa-brands fa-linkedin fa-lg"></i></a>
                <?php
            }

            ?>
        </div>
    </div>
</div>