<?php include 'header.php';
$msg = "";
if (!empty($_GET['delete'])) {
    $sp_id = $_GET['delete'];
    
    // Retrieve the banner image name from the database before deleting the record
    $sqlSelect = "SELECT sp_banner FROM services_and_programs WHERE sp_id=" . $sp_id;
    $result = $db->query($sqlSelect);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sp_banner = $row['sp_banner']; // Get the banner image name

        // Proceed with deleting the record
        $sql = "DELETE FROM services_and_programs WHERE sp_id=" . $sp_id;
        if ($db->query($sql) === TRUE) {
            
            // Path to the folder to remove
            $galleryFolder = "../sp_gallery/sp_" . $sp_id;

            // Path to the banner image to remove
            $bannerImage = "../sources/images/" . $sp_banner;

            // Check if the folder exists and remove it
            if (is_dir($galleryFolder)) {
                // Remove all files inside the folder before deleting the folder itself
                $files = glob($galleryFolder . '/*'); // Get all files in the folder
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file); // Delete each file
                    }
                }
                rmdir($galleryFolder); // Delete the folder
            }

            // Check if the banner image exists and remove it
            if (file_exists($bannerImage)) {
                unlink($bannerImage); // Delete the banner image
            }

            // Success message with popup
            $msg = "Program item is deleted successfully. Please click OK to continue.";
            echo "
                <!-- Modal HTML -->
                <div id='popup' class='fixed inset-0 hidden bg-black bg-opacity-50 z-50'>
                    <div class='absolute bg-white p-6 rounded-lg shadow-lg text-center'
                        style='top: 50%; left: 50%; transform: translate(-50%, -50%);'>
                        <p class='text-lg font-semibold'>$msg</p>
                        <button onclick='closePopup()' class='mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded'>
                            OK
                        </button>
                    </div>
                </div>

                <script>
                    // Show the modal popup
                    document.getElementById('popup').style.display = 'block';

                    // Function to close the popup and redirect
                    function closePopup() {
                        document.getElementById('popup').style.display = 'none';
                        window.location.href = 'program.php';
                    }
                </script>
            ";
            exit();
        } else {
            $msg = "Error deleting record: " . $db->error;
        }
    } else {
        $msg = "Record not found.";
    }
}

?>
<title>Programs</title>
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
            <h1 class="text-2xl font-bold">Programs</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">
            <div class="flex items-center">
                <button onclick="location.href='add_program.php'" class="btn-primary">Add New Program</button>
            </div>
        </section>
        <section class="p-4 m-4 bg-white shadow rounded-lg">
            <div class="text-red-600 mt-4"><?php echo $msg; ?></div>
            <?php
            $sp = "SELECT * FROM services_and_programs WHERE category_list = 'Program'";
            $sp_result = $db->query($sp);
            if ($sp_result->num_rows >= 0) {
                while ($sp_data = $sp_result->fetch_assoc()) {
                    $sp_id = $sp_data['sp_id'];
                    $sp_banner = $sp_data['sp_banner'];
                    if (is_null($sp_banner) || $sp_banner == '') {
                        $banner = 'no-image.png';
                    } else {
                        $banner = $sp_banner;
                    }
                    $sp_name = $sp_data['sp_name'];
                    $sp_short_description = $sp_data['sp_short_description'];
                    ?>
                    <div class="grid grid-cols-8 gap-4 my-4 border rounded-md">
                        <div class="h-[150px]"
                            style="background: #3A6732 url(../sources/images/<?php echo $banner ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
                        </div>
                        <div class="col-span-6 p-4">
                            <div class="text-2xl font-semibold"><?php echo $sp_name; ?></div>
                            <div><?php echo $sp_short_description; ?></div>
                        </div>
                        <div class="p-4 flex items-center justify-center gap-4">
                            <a href="edit_sp_general_info?editid=<?php echo $sp_id ?>"
                                class="block text-white bg-green-600 rounded-md px-4 py-2">Edit</a>
                            <a href="#" class="block text-white bg-red-500 rounded-md px-4 py-2" data-id="<?php echo $sp_id ?>"
                                onclick="confirmDelete(this)">Delete</a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </section>
    </div>

    <!-- Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50">
        <div class="absolute bg-white p-6 rounded-lg shadow-lg text-center"
            style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <p class="text-xl font-bold mb-4">Are you sure you want to delete this service?</p>
            <div class="flex justify-center gap-4">
                <button id="confirmBtn" class="px-4 py-2 bg-red-500 text-white rounded">Yes</button>
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">No</button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(element) {
            const spId = element.getAttribute('data-id');
            const modal = document.getElementById('deleteModal');
            const confirmBtn = document.getElementById('confirmBtn');

            modal.classList.remove('hidden'); // Show modal

            confirmBtn.onclick = function () {
                window.location.href = `service.php?delete=${spId}`; // Redirect to delete
            };
        }

        function closeModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden'); // Hide modal
        }
    </script>

    <?php include 'footer.php' ?>