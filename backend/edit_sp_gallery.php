<?php
include 'header.php';
$ms = '';
$editid = isset($_GET['editid']) ? intval($_GET['editid']) : 0;
$sp = "SELECT * FROM services_and_programs WHERE sp_id = $editid";
$result = $db->query($sp);
$data = $result->fetch_assoc();
$category_list = $data['category_list'];

if($category_list == 'Service' ){
    $back_link = 'service.php';
}else{
    $back_link = 'program.php';
}
$sp_gallery_image_path = $data['sp_gallery_image_path'];

if (empty($sp_gallery_image_path)) {
    $ms = "<p class='text-red-500'>Error: Image path is empty.</p>";
    $image_dir = "../sp_gallery/default/";
} else {
    $image_dir = "../sp_gallery/" . $sp_gallery_image_path . "/";

    // Ensure the target directory exists
    if (!is_dir($image_dir)) {
        mkdir($image_dir, 0777, true); // Create the directory with proper permissions
    }

    // Handle image upload
    if (isset($_POST['upload'])) {
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        $uploaded_files = $_FILES['images'];

        // Filter out non-selected files
        $selected_files = array_filter($uploaded_files['name']);

        if (!empty($selected_files)) {
            $upload_success = false;

            // Loop through all files
            foreach ($uploaded_files['name'] as $key => $name) {
                $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $tmp_name = $uploaded_files['tmp_name'][$key];

                if (!empty($tmp_name)) {
                    $check = getimagesize($tmp_name);
                    if ($check !== false && in_array($imageFileType, $allowed_types)) {
                        $new_filename = 'active_green_quad_bike_' . date('Ymd_His') . '_' . $key . '.' . $imageFileType;
                        $target_file = $image_dir . $new_filename;

                        if (move_uploaded_file($tmp_name, $target_file)) {
                            $upload_success = true;
                            $ms .= "<p class='text-green-500'>The file " . htmlspecialchars($new_filename) . " has been uploaded successfully.</p>";
                        } else {
                            $ms .= "<p class='text-red-500'>Sorry, there was an error uploading " . htmlspecialchars($name) . ".</p>";
                        }
                    } else {
                        $ms .= "<p class='text-red-500'>" . htmlspecialchars($name) . " is not an allowed file type or is not a valid image.</p>";
                    }
                } else {
                    $ms .= "<p class='text-red-500'>Image file is missing or not uploaded correctly.</p>";
                }
            }

            // Check if at least one file was successfully uploaded
            if (!$upload_success) {
                $ms .= "<p class='text-red-500'>No images were successfully uploaded. Please try again.</p>";
            }
        } else {
            $ms .= "<p class='text-red-500'>No images selected. Please select at least one image to upload.</p>";
        }

    }

}

// Handle image deletion
if (isset($_POST['delete'])) {
    $file_to_delete = $image_dir . $_POST['image_name'];
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
        $ms = "<p class='text-green-500'>The file " . htmlspecialchars($_POST['image_name']) . " has been deleted successfully.</p>";
    } else {
        $ms = "<p class='text-red-500'>Sorry, the file does not exist.</p>";
    }
    // Refresh the page after deletion
    header("Location: finishing_sp_3.php?editid=$editid&delete_status=1");
    exit();
}
?>

<style>
    /* Initially hide the delete button */
    .delete-button {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* Show delete button on hover */
    .image-container:hover .delete-button {
        opacity: 1;
    }
</style>

<title>Update <?php echo htmlspecialchars($category_list); ?></title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex-shrink-0 fixed h-screen z-50">
        <div class="p-4 text-2xl font-bold border-b">Admin</div>
        <?php include 'nav.php'; ?>
    </aside>
    <!-- Main Content -->
    <div class="flex-1" style="margin-left: 256px;">
        <header class="flex items-center justify-between fixed top-0 p-4 bg-gray-700 text-white"
            style="width: calc(100% - 256px);">
            <h1 class="text-2xl font-bold">Update <?php echo htmlspecialchars($category_list); ?>...</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">

            <ol
                class="flex items-center justify-between w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                <div class="flex items-center gap-4">
                    <li class="flex items-center cursor-pointer"
                        onclick="location.href='edit_sp_general_info.php?editid=<?php echo $editid; ?>'">
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">1</span>
                        <span>General Info</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center cursor-pointer"
                        onclick="location.href='edit_sp_featured_image.php?editid=<?php echo $editid; ?>'">
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">2</span>
                        <span>Featured Image</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center text-blue-600 dark:text-blue-500">
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">3</span>
                        <span>Gallery</span>
                    </li>
                </div>
                <div class="cursor-pointer bg-green-700 text-white px-4 py-1"
                    onclick="location.href='<?php echo $back_link; ?>'">Close</div>
            </ol>

            <section class="pt-8">
                <h2 class="text-2xl font-bold mb-4">Select images to upload</h2>
                <form action="finishing_sp_3.php?editid=<?php echo $editid; ?>" method="POST"
                    enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
                    <input type="file" name="images[]" multiple accept="image/*"
                        class="block w-full px-4 py-2 mb-4 border rounded-lg" />
                    <button type="submit" name="upload" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Upload
                        Images</button>
                </form>
                <?php if ($ms): ?>
                    <div class="mt-4">
                        <?php echo $ms; ?>
                    </div>
                <?php endif; ?>

                <h2 class="text-2xl font-bold my-4">Uploaded Images</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-4">
                    <?php
                    $images = glob($image_dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                    if (empty($images)) {
                        echo "<p>No images found in the gallery.</p>";
                    } else {
                        foreach ($images as $image) {
                            $image_name = basename($image);
                            ?>
                            <div class="relative image-container">
                                <img src="<?php echo $image_dir . htmlspecialchars($image_name); ?>" alt="Uploaded Image"
                                    class="w-full h-auto rounded-lg shadow-md">
                                <form action="finishing_sp_3.php?editid=<?php echo $editid; ?>" method="POST"
                                    class="absolute top-0 right-0 p-2">
                                    <input type="hidden" name="image_name" value="<?php echo htmlspecialchars($image_name); ?>">
                                    <button type="submit" name="delete"
                                        class="delete-button bg-red-500 text-white px-2 py-1 rounded-lg">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </section>
        </section>
    </div>
    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function (event) {
                if (!confirm('Are you sure you want to delete this image?')) {
                    event.preventDefault();
                }
            });
        });
    </script>