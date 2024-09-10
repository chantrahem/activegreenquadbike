<?php include 'header.php';
$msg = "";
if (!empty($_GET['delete'])) {
    $vdo_id = $_GET['delete'];

    // Retrieve the banner image name from the database before deleting the record
    $vdo = "SELECT youtube_link FROM video WHERE video_id =" . $vdo_id;
    $vdo_result = $db->query($vdo);

    if ($vdo_result->num_rows > 0) {
        $row = $vdo_result->fetch_assoc();
        // Proceed with deleting the record
        $sql = "DELETE FROM video WHERE video_id=" . $vdo_id;
        if ($db->query($sql) === TRUE) {
            $msg = "Video is deleted successfully. Please click OK to continue.";
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
                        window.location.href = 'video.php';
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

// Add video
if (isset($_POST['add-video'])) {
    $youtube_link = $_POST['youtube_link'];

    // SQL query to insert the YouTube link
    $add = "INSERT INTO video (youtube_link) VALUES (?)";  // Using a placeholder for prepared statements

    // Prepare the statement to avoid SQL injection
    if ($stmt = $db->prepare($add)) {
        // Bind the parameter to the statement (s = string)
        $stmt->bind_param("s", $youtube_link);
        
        // Execute the prepared statement
        if ($stmt->execute()) {
            // Success message
            $msg = "Video added successfully!";
            header('Location: video.php');
            exit();
        } else {
            // Error handling
            $msg = "Error: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        // Error preparing the SQL statement
        $msg = "Error preparing statement: " . $db->error;
    }
}
?>
<title>Videos</title>
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
            <h1 class="text-2xl font-bold">Video</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 m-4 bg-white shadow rounded-lg">
            <div class="text-red-600"><?php echo $msg; ?></div>

            <!-- Videos -->

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-8">
                <?php
                // Query to fetch all videos from the database
                $sql = "SELECT youtube_link, video_id FROM video";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    // Output data for each video
                    while ($row = $result->fetch_assoc()) {
                        $youtubeLink = $row['youtube_link'];
                        $vdo_id = $row['video_id'];

                        // Initialize $videoId to null
                        $videoId = null;

                        // Check if it's a full YouTube URL with 'v' parameter
                        if (strpos($youtubeLink, 'v=') !== false) {
                            parse_str(parse_url($youtubeLink, PHP_URL_QUERY), $queryParams);
                            if (isset($queryParams['v'])) {
                                $videoId = $queryParams['v'];
                            }
                        } elseif (strpos($youtubeLink, 'youtu.be/') !== false) {
                            // Handle shortened YouTube links like youtu.be/XXXX
                            $path = parse_url($youtubeLink, PHP_URL_PATH);
                            $videoId = substr($path, 1); // Get the ID part after '/'
                        }
                        ?>
                        <div>
                            <div class='bg-white rounded-lg shadow-lg p-4 relative'>
                            <?php
                            // Display the video if a valid videoId is found
                            if ($videoId) {
                                echo "<iframe class='w-full h-40 rounded' src='https://www.youtube.com/embed/$videoId' frameborder='0' allowfullscreen></iframe>
                    ";
                                ?>
                                <div class="absolute top-0 right-0">
                                    <a href="#" class="text-white bg-red-500 rounded-md flex items-center justify-center" data-id="<?php echo $vdo_id ?>"
                                        onclick="confirmDelete(this)"><span class="icon-[ic--baseline-close]" style="width: 24px; height: 24px;"></span></a>
                                </div>
                            </div>
                        </div>

                        <?php
                        } else {
                            echo "<p class='text-center text-gray-600'>Invalid video link: $youtubeLink</p>";
                        }
                    }
                } else {
                    echo "<p class='text-center text-gray-600'>No videos found.</p>";
                }
                ?>
                            <div class='bg-white rounded-lg shadow-lg p-4 flex justify-center items-center hover:border cursor-pointer min-h-40' onclick="showForm()">
                                <div class="text-center">
                                <span class="icon-[ic--baseline-add]" style="width: 24px; height: 24px;"></span>
                                <div>Add Video</div>
                                </div>
                            </div>
    </div>
    </section>
    </div>

    <!-- Hidden Form for Adding Video -->
    <div id="videoForm" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50">
        <div class="absolute bg-white p-6 rounded-lg shadow-lg text-center w-96"
            style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <h2 class="text-xl font-bold mb-4">Add New Video</h2>
            <form  action="" method="POST" enctype="multipart/form-data">
                <label for="youtube_link" class="block mb-2">YouTube Link:</label>
                <input type="url" id="youtube_link" name="youtube_link" class="border p-2 rounded w-full mb-4" required>
                
                <div class="flex justify-center gap-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded" name="add-video" id="add-video">Add Video</button>
                    <button type="button" onclick="closeForm()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50">
        <div class="absolute bg-white p-6 rounded-lg shadow-lg text-center"
            style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <p class="text-xl font-bold mb-4">Are you sure you want to delete this video?</p>
            <div class="flex justify-center gap-4">
                <button id="confirmBtn" class="px-4 py-2 bg-red-500 text-white rounded">Yes</button>
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">No</button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(element) {
            const vdoId = element.getAttribute('data-id');
            const modal = document.getElementById('deleteModal');
            const confirmBtn = document.getElementById('confirmBtn');

            modal.classList.remove('hidden'); // Show modal

            confirmBtn.onclick = function () {
                window.location.href = `video.php?delete=${vdoId}`; // Corrected redirect URL
            };
        }

        function closeModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden'); // Hide modal
        }

        function showForm() {
        document.getElementById('videoForm').classList.remove('hidden'); // Show the form
        }

        function closeForm() {
            document.getElementById('videoForm').classList.add('hidden'); // Hide the form
        }
    </script>

    <?php include 'footer.php' ?>
