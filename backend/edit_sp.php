<?php
include 'header.php';
$ms = '';
if (isset($_POST['add-service'])) {
    if (empty($_POST["sp_name"])) {
        $ms = 'Please input service name';
    } else {
        $category_list = 'Services';
        $sp_name = $_POST['sp_name'];
        $sp_sub_name = $_POST['sp_sub_name'];
        $sp_price = $_POST['sp_price'];
        $sp_departure_time = $_POST['sp_departure_time'];
        $sp_short_description = $_POST['sp_short_description'];
        $sp_description = $_POST['sp_description'];
        $sp_inclusion = $_POST['sp_inclusion'];
        $sp_notes = $_POST['sp_notes'];
        $sp_banner = $_FILES['sp_banner']['name'];
        $is_featured = $_POST['is_featured'];
        $book_url = $_POST['book_url'];

        // Insert the record
        $sql = "INSERT INTO services_and_programs (category_list, sp_name, sp_sub_name, sp_price, sp_departure_time, sp_short_description, sp_description, sp_inclusion, sp_notes, sp_banner, is_featured, book_url)
        VALUES ('$category_list', '$sp_name', '$sp_sub_name', '$sp_price', '$sp_departure_time', '$sp_short_description', '$sp_description', '$sp_inclusion', '$sp_notes', '$sp_banner', '$is_featured', '$book_url')";

        if ($db->query($sql) === TRUE) {
            // Get the last inserted ID
            $sp_id = $db->insert_id;

            // Generate the folder name and path
            $folder_name = "sp_" . $sp_id;
            $folder_path = "../sp_gallery/" . $folder_name;

            // Create the folder
            if (!file_exists($folder_path)) {
                mkdir($folder_path, 0777, true);
            }

            // Move the uploaded banner image to the appropriate folder
            $folder = '../sources/images';
            move_uploaded_file($_FILES['sp_banner']['tmp_name'], $folder . "/" . $sp_banner);

            // Update the sp_gallery_image_path with the folder name
            $update_sql = "UPDATE services_and_programs SET sp_gallery_image_path = '$folder_name' WHERE sp_id = $sp_id";

            if ($db->query($update_sql) === TRUE) {
                $ms = "Record inserted and folder created successfully.";
            } else {
                $ms = "Error updating record: " . $db->error;
            }
        } else {
            $ms = "Error: " . $sql . "<br>" . $db->error;
        }
    }
}
?>
<title>Update Service/Program: </title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex-shrink-0 fixed h-screen z-50">
        <div class="p-4 text-2xl font-bold border-b">Admin</div>
        <?php include 'nav.php' ?>
    </aside>
    <!-- Main Content -->
    <div class="flex-1 p-6" style="margin-left: 256px;">
        <header class="flex items-center justify-between fixed top-0 py-8 bg-gray-100"
            style="width: calc(100% - 304px);">
            <h1 class="text-2xl font-bold">Update Service/Program: </h1>
            <div>
                <button onclick="location.href='../logout'" class="ml-2 p-2 bg-blue-600 text-white rounded-lg">Sign
                    Out</button>
            </div>
        </header>
        <div class="" style="height: 80px;">...</div>
        <section class="p-4 bg-white shadow rounded-lg">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <input type="text" name="sp_name" id="sp_name"
                            class="w-full px-4 py-2 outline-none focus:outline-none border rounded-md"
                            placeholder="Service Name" required>
                    </div>

                    <div>
                        <input type="text" name="sp_sub_name" id="sp_sub_name" placeholder="Service Sub Name"
                            class="w-full px-4 py-2 outline-none focus:outline-none border rounded-md" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <textarea required class="w-full p-4 outline-none focus:outline-none border -z-10"
                            name="sp_price" id="myTextarea" cols="30" placeholder="Price List" rows="10"></textarea>
                    </div>
                    <div>
                        <textarea required class="w-full p-4 outline-none focus:outline-none border"
                            name="sp_departure_time" id="myTextarea" cols="30" placeholder="Departure Time"
                            rows="10"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <textarea required class="w-full p-4 outline-none focus:outline-none border"
                            name="sp_short_description" id="myTextarea" cols="30" placeholder="Short Description"
                            rows="10"></textarea>
                    </div>

                    <div>
                        <textarea required class="w-full p-4 outline-none focus:outline-none border"
                            name="sp_description" id="myTextarea" cols="30" placeholder="Description"
                            rows="10"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <textarea required class="w-full p-4 outline-none focus:outline-none border" name="sp_inclusion"
                            id="myTextarea" cols="30" placeholder="Inclusion" rows="10"></textarea>
                    </div>
                    <div>
                        <textarea required class="w-full p-4 outline-none focus:outline-none border" name="sp_notes"
                            id="myTextarea" cols="30" placeholder="Terms and Conditions" rows="10"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 mb-4">
                    <div>
                        <label for="sp_banner" class="block text-sm font-medium text-gray-700">Banner Image</label>
                        <input type="file" name="sp_banner" id="sp_banner"
                            class="w-full px-4 py-2 outline-none focus:outline-none border  rounded-md" required>
                    </div>

                    <div>
                        <label for="is_featured" class="block text-sm font-medium text-gray-700">Home Featured?</label>
                        <select name="is_featured" id="is_featured"
                            class="w-full px-4 py-2 outline-none focus:outline-none border rounded-md">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="book_url" class="block text-sm font-medium text-gray-700">Booking URL</label>
                        <input type="text" name="book_url" id="book_url"
                            class="w-full px-4 py-2 outline-none focus:outline-none border rounded-md" placeholder="Booking URL">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-2 px-8 mt-4 uppercase w-full lg:w-auto"
                        type="submit" name="update-sp">Update</button>
                </div>
            </form>
            <div class="text-red-600 mt-4"><?php echo $ms; ?></div>
        </section>
    </div>
    <?php include 'footer.php' ?>