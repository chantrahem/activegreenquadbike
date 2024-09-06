<?php
include 'header.php';
$ms = '';

if (isset($_POST['save'])) {
    $filename = $_FILES["uploadImage"]["name"];
    $tempname = $_FILES["uploadImage"]["tmp_name"];

    // Check if an image is selected
    if (empty($filename)) {
        $ms = "Please select an image to update.";
    } else {
        // Generate a random number based on the current date and time
        $randomNumber = date('YmdHis') . rand(1000, 9999);
        $newFilename = "active_green_quad_bike_" . $randomNumber . "." . strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $folder = "../sources/images/" . $newFilename;

        $filetype = array('gif', 'jpg', 'jpeg', 'png', 'webp', 'svg');
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Fetch the old image filename
        $query = "SELECT sticky_banner_home FROM about WHERE about_id=1";
        $result = $db->query($query);
        $data = $result->fetch_assoc();
        $oldImage = $data['sticky_banner_home'];

        // Delete the old image if it exists and is not the default "no-image.png"
        if (!empty($oldImage) && $oldImage != 'no-image.png' && file_exists("../sources/images/" . $oldImage)) {
            unlink("../sources/images/" . $oldImage);
        }

        // Move the new uploaded file with the new name
        if (move_uploaded_file($tempname, $folder)) {
            // Only assign the $update query if the file was successfully uploaded
            $update = "UPDATE about SET sticky_banner_home='$newFilename' WHERE about_id=1";

            if ($db->query($update) === TRUE) {
                $ms = "Updated successfully.";
            } else {
                $ms = "Something went wrong, please check: " . $db->error;
            }
        } else {
            $ms = "Failed to upload image. Please try again.";
        }
    }
}
?>


<title>Sticky Background</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex-shrink-0 fixed h-screen z-50">
        <div class="p-4 text-2xl font-bold border-b">Admin</div>
        <?php include 'nav.php' ?>
    </aside>
    <!-- Main Content -->
    <div class="flex-1" style="margin-left: 256px;">
    <header class="flex items-center justify-between fixed top-0 p-4 bg-[#F56960] text-white"
            style="width: calc(100% - 256px);">
            <h1 class="text-2xl font-bold">Sticky Background</h1>
            <div>
                <button onclick="location.href='../logout'" class="text-white rounded-lg">
                <span class="icon-[mdi--sign-out]" style="width: 24px; height: 24px;"></span>
                </button>
            </div>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                $sp = "SELECT sticky_banner_home FROM about WHERE about_id = 1";
                $result = $db->query($sp);
                $data = $result->fetch_assoc();
                $sp_image = $data['sticky_banner_home'];
                if (is_null($sp_image) || $sp_image == '') {
                    $image_quad = 'no-image.png';
                } else {
                    $image_quad = $sp_image;
                }
                ?>

                <div>
                    <label for="uploadImage" class="cursor-pointer">
                        <img class="border" id="uploadPreview" src="../sources/images/<?php echo $image_quad; ?>"
                            style="height:400px;">
                        <input id="uploadImage" type="file" name="uploadImage" onchange="PreviewImage();"
                            class="hidden" />
                    </label>
                </div>

                <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-2 px-8 mt-4 uppercase w-full lg:w-auto"
                    type="submit" name="save">Update</button>
            </form>
        </section>
    </div>
    <!-- Modal Popup -->
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
                window.location.href = 'sticky_background.php';
            });
        </script>
    <?php endif;
    include 'footer.php'; ?>