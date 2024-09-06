<?php
include 'header.php';
$ms = '';
$finish_id = $_GET['finish_id'];

if (isset($_POST['add-banner'])) {
    $filename = $_FILES["uploadImage"]["name"];
    $tempname = $_FILES["uploadImage"]["tmp_name"];

    // Check if an image is selected
    if (empty($filename)) {
        $ms = "Please select an image to add.";
    } else {
        // Generate a random number based on the current date and time
        $randomNumber = date('YmdHis') . rand(1000, 9999);
        $newFilename = "active_green_quad_bike_" . $randomNumber . "." . strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $folder = "../sources/images/" . $newFilename;

        $filetype = array('gif', 'jpg', 'jpeg', 'png', 'webp', 'svg');
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Fetch the old image filename
        $query = "SELECT sp_banner FROM services_and_programs WHERE sp_id=$finish_id";
        $result = $db->query($query);
        $data = $result->fetch_assoc();
        $oldImage = $data['sp_banner'];

        // Delete the old image if it exists and is not the default "no-image.png"
        if (!empty($oldImage) && $oldImage != 'no-image.png' && file_exists("../sources/images/" . $oldImage)) {
            unlink("../sources/images/" . $oldImage);
        }

        // Move the new uploaded file with the new name
        if (move_uploaded_file($tempname, $folder)) {
            // Only assign the $update query if the file was successfully uploaded
            $update = "UPDATE services_and_programs SET sp_banner='$newFilename' WHERE sp_id=$finish_id";

            if ($db->query($update) === TRUE) {
                $ms = "Add successfully.";
            } else {
                $ms = "Something went wrong, please check: " . $db->error;
            }
        } else {
            $ms = "Failed to upload image. Please try again.";
        }
    }
}

$sp = "SELECT * FROM services_and_programs WHERE sp_id = $finish_id";
$result = $db->query($sp);
$data = $result->fetch_assoc();
$category_list = $data['category_list'];
$sp_banner = $data['sp_banner'];
?>
<title>Adding <?php echo $category_list ?></title>
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
            <h1 class="text-2xl font-bold">Adding <?php echo $category_list ?>...</h1>
            <div>
                <button onclick="location.href='../logout'" class="text-white rounded-lg">
                    <span class="icon-[mdi--sign-out]" style="width: 24px; height: 24px;"></span>
                </button>
            </div>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">
        <form action="" method="POST" enctype="multipart/form-data">
            <ol
                class="flex items-center justify-between w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                <div class="flex items-center gap-4">
                    <li class="flex items-center cursor-pointer"
                        onclick="location.href='finishing_sp_1.php?finish_id=<?php echo $finish_id ?>'">
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            1
                        </span>
                        <span>General Info</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center text-blue-600 dark:text-blue-500">
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                            2
                        </span>
                        <span>Featured Image</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center cursor-pointer"
                        onclick="location.href='finishing_sp_3.php?finish_id=<?php echo $finish_id ?>'">
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            3
                        </span>
                        <span>Gallery</span>
                    </li>
                </div>
                <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-1 px-4 uppercase"
                    type="submit" name="add-banner">NEXT</button>
            </ol>

            
                <?php
                $sp_banner = $data['sp_banner'];
                if (is_null($sp_banner) || $sp_banner == '') {
                    $image = 'no-image.png';
                } else {
                    $image = $sp_banner;
                }
                ?>

                <div class="mt-4">
                    <label for="uploadImage" class="cursor-pointer">
                        <img class="border" id="uploadPreview" src="../sources/images/<?php echo $image; ?>"
                            style="height:400px;">
                        <input id="uploadImage" type="file" name="uploadImage" onchange="PreviewImage();"
                            class="hidden" />
                    </label>
                </div>
            </form>
        </section>
    </div>
    <?php if (!empty($ms)): ?>
        <?php
        // Set a success flag if the message contains "Add successfully."
        $isSuccess = (strpos($ms, 'Add successfully') !== false) ? 'true' : 'false';
        ?>
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
            document.getElementById('closeButton').addEventListener('click', function () {
                // Check if the operation was successful
                var isSuccess = <?php echo $isSuccess; ?>;
                if (isSuccess) {
                    // Redirect to finishing_sp_3.php if success
                    window.location.href = 'finishing_sp_3.php?finish_id=<?php echo $finish_id ?>';
                } else {
                    // Stay on the same page if error
                    window.location.href = 'finishing_sp_2.php?finish_id=<?php echo $finish_id ?>';
                }
            });
        </script>
    <?php endif; ?>