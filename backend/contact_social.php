<?php include 'header.php';
// Update Contact & Social
$ms = '';
if (isset($_POST['save-contact'])) {
    $phone_1 = $db->real_escape_string($_POST['phone_1']);
    $phone_2 = $db->real_escape_string($_POST['phone_2']);
    $email_address = $db->real_escape_string($_POST['email_address']);
    $telegram = $db->real_escape_string($_POST['telegram']);
    $whatsapp = $db->real_escape_string($_POST['whatsapp']);
    $wechat = $db->real_escape_string($_POST['wechat']);
    $facebook = $db->real_escape_string($_POST['facebook']);
    $instagram = $db->real_escape_string($_POST['instagram']);
    $linkedin = $db->real_escape_string($_POST['linkedin']);
    $tiktok = $db->real_escape_string($_POST['tiktok']);
    $tripadvisor = $db->real_escape_string($_POST['tripadvisor']);
    $google = $db->real_escape_string($_POST['google']);
    
    if (empty($phone_1)) {
        $ms = 'Please input "Phone 1" value';
    } elseif (empty($email_address)) {
        $ms = 'Please input "Email Address" value';
    } else {
        $update = "UPDATE about SET 
            phone_1='$phone_1', 
            phone_2='$phone_2', 
            email_address='$email_address', 
            telegram='$telegram', 
            whatsapp='$whatsapp', 
            wechat='$wechat', 
            facebook='$facebook', 
            instagram='$instagram', 
            linkedin='$linkedin', 
            tiktok='$tiktok', 
            tripadvisor='$tripadvisor', 
            google='$google' 
            WHERE about_id=1";
        
        if ($db->query($update) === TRUE) {
            $ms = "Updated successfully";
        } else {
            $ms = "Something went wrong, please check: " . $db->error;
        }
    }
}
?>


<title>Contact Information</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex-shrink-0 fixed h-screen z-50">
        <div class="p-4 text-2xl font-bold border-b">Admin</div>
        <?php include 'nav.php' ?>
    </aside>
    <!-- Main Content -->
    <div class="flex-1" style="margin-left: 256px;">
    <header class="flex items-center justify-between fixed top-0 p-4 bg-gray-700 text-white"
            style="width: calc(100% - 256px);">
            <h1 class="text-2xl font-bold">Contacts & Socials</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                $sp = "SELECT * FROM about WHERE about_id = 1";
                $result = $db->query($sp);
                $data = $result->fetch_assoc();
                $phone_1 = $data['phone_1'];
                $phone_2 = $data['phone_2'];
                $email_address = $data['email_address'];
                $telegram = $data['telegram'];
                $whatsapp = $data['whatsapp'];
                $wechat = $data['wechat'];
                $facebook = $data['facebook'];
                $instagram = $data['instagram'];
                $linkedin = $data['linkedin'];
                $tiktok = $data['tiktok'];
                $tripadvisor = $data['tripadvisor'];
                $google = $data['google'];
                ?>
                <div class="mb-4 font-semibold text-2xl">Contact</div>
                <div class="border rounded-md p-4">
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <div class="mb-2 font-semibold">Phone 1:</div>
                            <div class="mb-4"><input required class="w-full p-4 outline-none focus:outline-none border"
                                    type="text" name="phone_1" id="phone_1" value="<?php echo $phone_1; ?>"></div>
                        </div>
                        <div>
                            <div class="mb-2 font-semibold">Phone 2:</div>
                            <div class="mb-4"><input class="w-full p-4 outline-none focus:outline-none border"
                                    type="text" name="phone_2" id="phone_2" value="<?php echo $phone_2; ?>"></div>
                        </div>
                        <div>
                            <div class="mb-2 font-semibold">Email:</div>
                            <div class="mb-4"><input required class="w-full p-4 outline-none focus:outline-none border"
                                    type="text" name="email_address" id="email_address"
                                    value="<?php echo $email_address; ?>"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <div class="mb-2 font-semibold">Telegram:</div>
                            <div class="mb-4"><input  class="w-full p-4 outline-none focus:outline-none border"
                                    type="text" name="telegram" id="telegram" value="<?php echo $telegram; ?>"></div>
                        </div>
                        <div>
                            <div class="mb-2 font-semibold">WhatsApp:</div>
                            <div class="mb-4"><input  class="w-full p-4 outline-none focus:outline-none border"
                                    type="text" name="whatsapp" id="whatsapp" value="<?php echo $whatsapp; ?>"></div>
                        </div>
                        <div>
                            <div class="mb-2 font-semibold">WeChat:</div>
                            <div class="mb-4"><input  class="w-full p-4 outline-none focus:outline-none border"
                                    type="text" name="wechat" id="wechat" value="<?php echo $wechat; ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="my-4 font-semibold text-2xl">Social</div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="border rounded-md p-4 flex flex-col gap-4">
                        <div class="flex items-center gap-4">
                            <label class="w-32">Facebook link</label>
                            <input  class="w-full p-4 outline-none focus:outline-none border" type="text"
                                name="facebook" id="facebook" value="<?php echo $facebook; ?>">
                        </div>
                        <div class="flex items-center gap-4">
                            <label class="w-32">Instagram link</label>
                            <input  class="w-full p-4 outline-none focus:outline-none border" type="text"
                                name="instagram" id="instagram" value="<?php echo $instagram; ?>">
                        </div>
                        <div class="flex items-center gap-4">
                            <label class="w-32">Linkedin link</label>
                            <input  class="w-full p-4 outline-none focus:outline-none border" type="text"
                                name="linkedin" id="linkedin" value="<?php echo $linkedin; ?>">
                        </div>
                    </div>
                    <div class="border rounded-md p-4 flex flex-col gap-4">
                        <div class="flex items-center gap-4">
                            <label class="w-32">TikTok link</label>
                            <input  class="w-full p-4 outline-none focus:outline-none border" type="text"
                                name="tiktok" id="tiktok" value="<?php echo $tiktok; ?>">
                        </div>
                        <div class="flex items-center gap-4">
                            <label class="w-32">Tripadvisor link</label>
                            <input  class="w-full p-4 outline-none focus:outline-none border" type="text"
                                name="tripadvisor" id="tripadvisor" value="<?php echo $tripadvisor; ?>">
                        </div>
                        <div class="flex items-center gap-4">
                            <label class="w-32">Google link</label>
                            <input  class="w-full p-4 outline-none focus:outline-none border" type="text"
                                name="google" id="google" value="<?php echo $google; ?>">
                        </div>
                    </div>
                </div>
                <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-2 px-8 mt-4 uppercase w-full lg:w-auto"
                    type="submit" name="save-contact">Update</button>
            </form>
        </section>
    </div>

    <?php if (!empty($ms)) : ?>
        <div id="messageModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm w-full">
                <h2 class="text-2xl font-bold mb-4">Message</h2>
                <p class="mb-4"><?php echo $ms; ?></p>
                <button id="closeButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Close
                </button>
            </div>
        </div>

        <script>
            document.getElementById('closeButton').addEventListener('click', function() {
                // Hide the popup
                document.getElementById('messageModal').style.display = 'none';
                // Refresh the page after closing the popup
                window.location.href = 'contact_social.php';
            });
        </script>
    <?php endif;
    include 'footer.php'; ?>