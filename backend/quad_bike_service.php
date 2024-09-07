<?php
include 'header.php';
$alert = '';

if (isset($_POST['save'])) {
    $filename = $_FILES["uploadImage"]["name"];
    $tempname = $_FILES["uploadImage"]["tmp_name"];

    // Generate a random number based on the current date and time
    $randomNumber = date('YmdHis') . rand(1000, 9999);
    $newFilename = "active_green_quad_bike_" . $randomNumber . "." . strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $folder = "../sources/images/" . $newFilename;

    $filetype = array('gif', 'jpg', 'jpeg', 'png', 'webp', 'svg');
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $name = mysqli_real_escape_string($db, $_POST['sp_name']);
    $description = mysqli_real_escape_string($db, $_POST['sp_description']);

    if (empty($name)) {
        $alert = 'Please input "Name" value';
    } elseif (empty($description)) {
        $alert = 'Please input "Description Value"';
    } elseif (empty($_FILES["uploadImage"]["name"])) {
        $update = "UPDATE about SET sp_name='$name', sp_description='$description' WHERE about_id=1";
    } else {
        // Fetch the old image filename
        $query = "SELECT sp_image FROM about WHERE about_id=1";
        $result = $db->query($query);
        $data = $result->fetch_assoc();
        $oldImage = $data['sp_image'];

        // Delete the old image if it exists and is not the default "no-image.png"
        if (!empty($oldImage) && $oldImage != 'no-image.png' && file_exists("../sources/images/" . $oldImage)) {
            unlink("../sources/images/" . $oldImage);
        }

        // Move the new uploaded file with the new name
        if (move_uploaded_file($tempname, $folder)) {
            $update = "UPDATE about SET sp_image='$newFilename', sp_name='$name', sp_description='$description' WHERE about_id=1";
        } else {
            $alert = "Failed to upload image. Please try again.";
        }
    }

    if ($db->query($update) === TRUE) {
        $alert = "Updated successfully";
    } else {
        $alert = "Something went wrong, please check: " . $db->error;
    }
}

?>

<title>Quad Bike Service</title>
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
            <h1 class="text-2xl font-bold">Quad Bike Service</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                $sp = "SELECT sp_image, sp_name, sp_description FROM about WHERE about_id = 1";
                $result = $db->query($sp);
                $data = $result->fetch_assoc();
                $sp_image = $data['sp_image'];
                if (is_null($sp_image) || $sp_image == '') {
                    $image_quad = 'no-image.png';
                } else {
                    $image_quad = $sp_image;
                }
                $sp_name = $data['sp_name'];
                $sp_description = $data['sp_description'];
                ?>
                <div class="grid grid-cols-2 gap-16">
                    <div>
                        <label for="uploadImage" class="cursor-pointer">
                            <img class="border" id="uploadPreview" src="../sources/images/<?php echo $image_quad; ?>"
                                style="width:100%;">
                            <input id="uploadImage" type="file" name="uploadImage" onchange="PreviewImage();"
                                class="hidden" />
                        </label>
                    </div>
                    <div>
                        <div class="mb-2 font-semibold">Name:</div>
                        <div class="mb-8"><input required
                                class="w-full p-4 outline-none focus:outline-none border border-[#F56960]" type="text"
                                name="sp_name" id="sp_name" value="<?php echo $sp_name; ?>"></div>
                        <div class="mb-2 font-semibold">Description:</div>
                        <div class="mb-4"><textarea required
                                class="w-full p-4 outline-none focus:outline-none border border-[#F56960]"
                                name="sp_description" cols="30" rows="16"><?php echo $sp_description; ?></textarea>
                        </div>
                    </div>
                </div>
                <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-2 px-8 mt-4 uppercase w-full lg:w-auto"
                    type="submit" name="save">Update</button>
            </form>
        </section>
    </div>

    <?php if (!empty($alert)): ?>
        <div id="messageModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm w-full">
                <h2 class="text-2xl font-bold mb-4">Message</h2>
                <p class="mb-4"><?php echo $alert; ?></p>
                <button id="closeButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Close
                </button>
            </div>
        </div>

        <script>
            document.getElementById('closeButton').addEventListener('click', function () {
                // Hide the popup
                document.getElementById('messageModal').style.display = 'none';
                // Refresh the page after closing the popup
                window.location.href = 'quad_bike_service.php';
            });
        </script>
    <?php endif;
    include 'footer.php'; ?>