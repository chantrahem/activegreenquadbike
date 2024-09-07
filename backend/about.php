<?php include 'header.php';
$alert = '';

// Update Icon
if (isset($_POST['save-icon'])) {
    $filename = $_FILES["uploadIconImage"]["name"];
    $tempname = $_FILES["uploadIconImage"]["tmp_name"];

    // Generate a random number based on the current date and time
    $randomNumber = date('YmdHis') . rand(1000, 9999);
    $newFilename = "active_green_quad_bike_favicon_" . $randomNumber . "." . strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $folder = "../sources/images/" . $newFilename;

    if (empty($filename)) {
        $alert = "Please select a favicon image to update.";
    } else {
        // Fetch the old image filename
        $query = "SELECT favicon FROM about WHERE about_id=1";
        $result = $db->query($query);
        $data = $result->fetch_assoc();
        $oldImage = $data['favicon'];

        // Delete the old image if it exists and is not the default "no-image.png"
        if (!empty($oldImage) && $oldImage != 'no-image.png' && file_exists("../sources/images/" . $oldImage)) {
            unlink("../sources/images/" . $oldImage);
        }

        // Move the new uploaded file with the new name
        if (move_uploaded_file($tempname, $folder)) {
            $update = "UPDATE about SET favicon='$newFilename' WHERE about_id=1";
        } else {
            $alert = "Failed to upload favicon. Please try again.";
        }
    }

    // Only execute the query if $update is set
    if (isset($update)) {
        if ($db->query($update) === TRUE) {
            $alert = "Updated successfully";
        } else {
            $alert = "Something went wrong, please check: " . $db->error;
        }
    }
}

// Update Logo
if (isset($_POST['save-logo'])) {
    $filename = $_FILES["uploadLogoImage"]["name"];
    $tempname = $_FILES["uploadLogoImage"]["tmp_name"];

    // Generate a random number based on the current date and time
    $randomNumber = date('YmdHis') . rand(1000, 9999);
    $newFilename = "active_green_quad_bike_logo_" . $randomNumber . "." . strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $folder = "../sources/images/" . $newFilename;

    if (empty($filename)) {
        $alert = "Please select a logo image to update.";
    } else {
        // Fetch the old image filename
        $query = "SELECT logo FROM about WHERE about_id=1";
        $result = $db->query($query);
        $data = $result->fetch_assoc();
        $oldImage = $data['logo'];

        // Delete the old image if it exists and is not the default "no-image.png"
        if (!empty($oldImage) && $oldImage != 'no-image.png' && file_exists("../sources/images/" . $oldImage)) {
            unlink("../sources/images/" . $oldImage);
        }

        // Move the new uploaded file with the new name
        if (move_uploaded_file($tempname, $folder)) {
            $update = "UPDATE about SET logo='$newFilename' WHERE about_id=1";
        } else {
            $alert = "Failed to upload logo. Please try again.";
        }
    }

    // Only execute the query if $update is set
    if (isset($update)) {
        if ($db->query($update) === TRUE) {
            $alert = "Updated successfully";
        } else {
            $alert = "Something went wrong, please check: " . $db->error;
        }
    }
}

// Update About Photo
if (isset($_POST['save-image'])) {
    $filename = $_FILES["uploadAboutImage"]["name"];
    $tempname = $_FILES["uploadAboutImage"]["tmp_name"];

    // Generate a random number based on the current date and time
    $randomNumber = date('YmdHis') . rand(1000, 9999);
    $newFilename = "active_green_quad_bike_" . $randomNumber . "." . strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $folder = "../sources/images/" . $newFilename;

    if (empty($filename)) {
        $alert = "Please select an about image to update.";
    } else {
        // Fetch the old image filename
        $query = "SELECT about_image FROM about WHERE about_id=1";
        $result = $db->query($query);
        $data = $result->fetch_assoc();
        $oldImage = $data['about_image'];

        // Delete the old image if it exists and is not the default "no-image.png"
        if (!empty($oldImage) && $oldImage != 'no-image.png' && file_exists("../sources/images/" . $oldImage)) {
            unlink("../sources/images/" . $oldImage);
        }

        // Move the new uploaded file with the new name
        if (move_uploaded_file($tempname, $folder)) {
            $update = "UPDATE about SET about_image='$newFilename' WHERE about_id=1";
        } else {
            $alert = "Failed to upload about image. Please try again.";
        }
    }

    // Only execute the query if $update is set
    if (isset($update)) {
        if ($db->query($update) === TRUE) {
            $alert = "Updated successfully";
        } else {
            $alert = "Something went wrong, please check: " . $db->error;
        }
    }
}

//Update About Text & Description
if (isset($_POST['save-about'])) {
    $company_name = ($_POST['company_name']);
    $start_year = ($_POST['start_year']);
    $about_description = ($_POST['about_description']);
    $full_address = ($_POST['full_address']);
    if (empty($company_name)) {
        $alert = 'Please input "Company Name" value';
    } elseif (empty($start_year)) {
        $alert = 'Please input "Start Year" value';
    } elseif (empty($about_description)) {
        $alert = 'Please input "Description" value';
    } elseif (empty($full_address)) {
        $alert = 'Please input "Full Address" value';
    } else {
        $update = "UPDATE about SET company_name='$company_name', start_year='$start_year', about_description='$about_description', full_address='$full_address' WHERE about_id=1";
    }
    if ($db->query($update) === TRUE) {
        $alert = "Updated successfully";
    } else {
        $alert = "Something went wrong, please check: " . $db->error;
    }
}

?>

<title>About</title>
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
            <h1 class="text-2xl font-bold">About</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">
            <div class="grid grid-cols-3 gap-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="shadow-md p-4 border">
                        <?php
                        $sp = "SELECT favicon, logo, about_image FROM about WHERE about_id = 1";
                        $result = $db->query($sp);
                        $data = $result->fetch_assoc();
                        $favicon = $data['favicon'];
                        if (is_null($favicon) || $favicon == '') {
                            $icon = 'no-image.png';
                        } else {
                            $icon = $favicon;
                        }
                        ?>
                        <div class="border-b mb-4">Favicon</div>
                        <div class="w-full flex items-center justify-between">
                            <label for="uploadIconImage" class="cursor-pointer">
                                <img id="uploadIconPreview" src="../sources/images/<?php echo $icon; ?>"
                                    style="height:50px;">
                                <input id="uploadIconImage" type="file" name="uploadIconImage"
                                    onchange="PreviewIconImage();" class="hidden" />
                            </label>
                            <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-2 px-8 uppercase w-auto"
                                type="submit" name="save-icon">Update</button>
                        </div>
                    </div>
                </form>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="shadow-md p-4 border">
                        <?php
                        $logo = $data['logo'];
                        if (is_null($favicon) || $favicon == '') {
                            $logo_img = 'no-image.png';
                        } else {
                            $logo_img = $logo;
                        }
                        ?>
                        <div class="border-b mb-4">Logo</div>
                        <div class="w-full flex items-center justify-between">
                            <label for="uploadLogoImage" class="cursor-pointer">
                                <img id="uploadLogoPreview" src="../sources/images/<?php echo $logo_img; ?>"
                                    style="height:50px;">
                                <input id="uploadLogoImage" type="file" name="uploadLogoImage"
                                    onchange="PreviewLogoImage();" class="hidden" />
                            </label>
                            <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-2 px-8 uppercase w-auto"
                                type="submit" name="save-logo">Update</button>
                        </div>
                    </div>
                </form>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="shadow-md p-4 border">
                        <?php
                        $about_image = $data['about_image'];
                        if (is_null($about_image) || $about_image == '') {
                            $about_img = 'no-image.png';
                        } else {
                            $about_img = $about_image;
                        }
                        ?>
                        <div class="border-b mb-4">About Photo</div>
                        <div class="w-full flex items-center justify-between">
                            <label for="uploadAboutImage" class="cursor-pointer">
                                <img id="uploadAboutPreview" src="../sources/images/<?php echo $about_img; ?>"
                                    style="height:50px;">
                                <input id="uploadAboutImage" type="file" name="uploadAboutImage"
                                    onchange="PreviewAboutImage();" class="hidden" />
                            </label>
                            <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-2 px-8 uppercase w-auto"
                                type="submit" name="save-image">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="p-4 m-4 bg-white shadow rounded-lg">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                $sp = "SELECT company_name, start_year, about_description, full_address FROM about WHERE about_id = 1";
                $result = $db->query($sp);
                $data = $result->fetch_assoc();
                $company_name = $data['company_name'];
                $start_year = $data['start_year'];
                $about_description = $data['about_description'];
                $full_address = $data['full_address'];
                ?>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="mb-2 font-semibold">Company Name:</div>
                        <div class="mb-4"><input required class="w-full p-4 outline-none focus:outline-none border"
                                type="text" name="company_name" id="company_name" value="<?php echo $company_name; ?>">
                        </div>
                    </div>
                    <div>
                        <div class="mb-2 font-semibold">Start Year:</div>
                        <div class="mb-4"><input required class="w-full p-4 outline-none focus:outline-none border"
                                type="text" name="start_year" id="start_year" value="<?php echo $start_year; ?>"></div>
                    </div>
                </div>
                <div>
                    <div class="mb-2 font-semibold">Full Address:</div>
                    <div class="mb-4"><input required class="w-full p-4 outline-none focus:outline-none border"
                            type="text" name="full_address" id="full_address" value="<?php echo $full_address; ?>">
                    </div>
                </div>
                <div class="mb-2 font-semibold">Description:</div>
                <div class="mb-4"><textarea required class="w-full p-4 outline-none focus:outline-none border"
                        name="about_description" id="myTextarea" cols="30"
                        rows="10"><?php echo $about_description; ?></textarea>
                </div>
                <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-2 px-8 mt-4 uppercase w-full lg:w-auto"
                    type="submit" name="save-about">Update</button>
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
                window.location.href = 'about.php';
            });
        </script>
    <?php endif;
    include 'footer.php'; ?>