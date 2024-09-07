<?php
include 'header.php';
$alert = '';
if (isset($_POST['save'])) {
    $highlight = ($_POST['about_highlight']);
    $description = ($_POST['short_description']);
    if (empty($highlight)) {
        $alert = 'Please input "Highlight Title" value';
    } elseif (empty($description)) {
        $alert = 'Please input "Short Description Valuue" value';
    } else {
        $update = "UPDATE about SET about_highlight='$highlight', short_description='$description' WHERE about_id=1";
    }
    if ($db->query($update) === TRUE) {
        $alert = "Updated successfully";
    } else {
        $alert = "Something went wrong, please check: " . $db->error;
    }
}
?>
<title>Home Banner Text</title>
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
            <h1 class="text-2xl font-bold">Home Hero Text</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                $sp = "SELECT about_highlight, short_description FROM about WHERE about_id = 1";
                $result = $db->query($sp);
                $data = $result->fetch_assoc();
                $about_highlight = $data['about_highlight'];
                $short_description = $data['short_description'];
                ?>
                <div class="mb-2 font-semibold">Highlight Title:</div>
                <div class="mb-4"><input required
                        class="w-full p-4 outline-none focus:outline-none border border-[#F56960]" type="text"
                        name="about_highlight" id="about_highlight" value="<?php echo $about_highlight; ?>"></div>
                <div class="mb-2 font-semibold">Short Description:</div>
                <div class="mb-4"><textarea required
                        class="w-full p-4 outline-none focus:outline-none border border-[#F56960]"
                        name="short_description" id="short_description" cols="30"
                        rows="10"><?php echo $short_description; ?></textarea>
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
                window.location.href = 'home_banner_text.php';
            });
        </script>
    <?php endif;
    include 'footer.php'; ?>