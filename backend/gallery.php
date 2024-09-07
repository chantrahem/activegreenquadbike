<?php include 'header.php';
$ms = '';
// Define image folder
$image_dir = "../sources/images/gallery/";

// Handle image upload
if (isset($_POST['upload'])) {
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    $uploaded_files = $_FILES['images'];

    for ($i = 0; $i < count($uploaded_files['name']); $i++) {
        if (!empty($uploaded_files["tmp_name"][$i])) {  // Check if the temp name is not empty
            $imageFileType = strtolower(pathinfo($uploaded_files["name"][$i], PATHINFO_EXTENSION));
            $check = getimagesize($uploaded_files["tmp_name"][$i]);

            // Check if image file is a real image and if it is an allowed type
            if ($check !== false && in_array($imageFileType, $allowed_types)) {
                // Generate a new name for the image using the current date and time
                $new_filename = 'active_green_quad_bike_' . date('Ymd_His') . '.' . $imageFileType;
                $target_file = $image_dir . $new_filename;

                // Move the uploaded file to the target directory
                if (move_uploaded_file($uploaded_files["tmp_name"][$i], $target_file)) {
                    $ms = "<p class='text-green-500'>The file " . htmlspecialchars($new_filename) . " has been uploaded.</p>";
                } else {
                    $ms = "<p class='text-red-500'>Sorry, there was an error uploading " . htmlspecialchars($uploaded_files["name"][$i]) . ".</p>";
                }
            } else {
                $ms = "<p class='text-red-500'>" . htmlspecialchars($uploaded_files["name"][$i]) . " is not an allowed file type or is not an image.</p>";
            }
        } else {
            $ms = "<p class='text-red-500'>No file selected or the file is invalid.</p>";
        }
    }

}

// Handle image deletion
if (isset($_POST['delete'])) {
    $file_to_delete = $image_dir . $_POST['image_name'];
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
        $ms = "<p class='text-green-500'>The file " . htmlspecialchars($_POST['image_name']) . " has been deleted.</p>";
    } else {
        $ms = "<p class='text-red-500'>Sorry, the file does not exist.</p>";
    }
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
<title>Gallery</title>
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
            <h1 class="text-2xl font-bold">Gallery</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">
            <section>
                <h2 class="text-2xl font-bold mb-4">Select images to upload</h2>
                <form action="gallery.php" method="POST" enctype="multipart/form-data"
                    class="bg-white p-6 rounded-lg shadow-lg">
                    <input type="file" name="images[]" multiple
                        class="block w-full text-gray-700 py-2 px-3 border border-gray-300 rounded mb-4">
                    <button type="submit" name="upload" class="bg-blue-500 text-white px-4 py-2 rounded">Upload
                        Images</button>
                </form>

                <?php if ($ms): ?>
                    <div class="mt-4">
                        <?php echo $ms; ?>
                    </div>
                <?php endif; ?>
            </section>

            <!-- Gallery Images -->
            <section>
                <h2 class="text-2xl font-bold my-4">Uploaded Images</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-6 gap-4">
                    <?php

                    // Display images
                    $images = glob($image_dir . "*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE);

                    foreach ($images as $image) {
                        $image_name = basename($image);
                        echo "<div class='relative image-container'>";
                        echo "<img src='" . $image . "' alt='Gallery Image' class='w-full h-auto object-cover rounded-lg shadow-lg'>";
                        echo "<form action='gallery.php' method='POST' class='absolute top-2 right-2 delete-button'>";
                        echo "<input type='hidden' name='image_name' value='" . $image_name . "'>";
                        echo "<button type='submit' name='delete' class='bg-red-500 text-white px-2 py-1 rounded'>Delete</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </section>
        </section>

    </div>

    <?php include 'footer.php' ?>