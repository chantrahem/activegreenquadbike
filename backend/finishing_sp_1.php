<?php
include 'header.php';
$ms = '';
$finish_id = $_GET['finish_id'];

if (isset($_POST['add-service'])) {
    $sp_name = $_POST['sp_name'];
    $sp_sub_name = $_POST['sp_sub_name'];
    $sp_price = $_POST['sp_price'];
    $sp_departure_time = $_POST['sp_departure_time'];
    $sp_short_description = $_POST['sp_short_description'];
    $sp_description = $_POST['sp_description'];
    $sp_inclusion = $_POST['sp_inclusion'];
    $sp_notes = $_POST['sp_notes'];
    $is_featured = $_POST['is_featured'];
    $book_url = $_POST['book_url'];

    $update_sql = "UPDATE services_and_programs SET sp_name = '$sp_name', sp_sub_name = '$sp_sub_name', sp_price = '$sp_price', sp_departure_time = '$sp_departure_time', sp_short_description = '$sp_short_description', sp_description = '$sp_description', sp_inclusion = '$sp_inclusion', sp_notes = '$sp_notes', is_featured = '$is_featured', book_url = '$book_url'  WHERE sp_id = $finish_id";

    if ($db->query($update_sql) === TRUE) {
        $ms = "Record updated successfully.";
        header("Location: finishing_sp_2.php?finish_id=" . $finish_id);
        exit();
    } else {
        $ms = "Error updating record: " . $db->error;
    }
}


$sp = "SELECT * FROM services_and_programs WHERE sp_id = $finish_id";
$result = $db->query($sp);
$data = $result->fetch_assoc();
$category_list = $data['category_list'];
$sp_name = $data['sp_name'];
$sp_sub_name = $data['sp_sub_name'];
$sp_price = $data['sp_price'];
$sp_departure_time = $data['sp_departure_time'];
$sp_short_description = $data['sp_short_description'];
$sp_description = $data['sp_description'];
$sp_inclusion = $data['sp_inclusion'];
$sp_notes = $data['sp_notes'];
$sp_banner = $data['sp_banner'];
$is_featured = $data['is_featured'];
$book_url = $data['book_url'];
?>
<title>Adding <?php echo $category_list ?>...</title>
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
                        <li class="flex items-center text-blue-600 dark:text-blue-500">
                            <span
                                class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                                1
                            </span>
                            <span>General Info</span>
                            <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                            </svg>
                        </li>
                        <li class="flex items-center cursor-pointer"
                            onclick="location.href='finishing_sp_2.php?finish_id=<?php echo $finish_id ?>'">
                            <span
                                class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                                2
                            </span>
                            <span>Featured Image</span>
                            <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
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
                    <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-1 px-4 uppercase" type="submit"
                        name="add-service">NEXT</button>
                </ol>

                <!-- Displaying Form -->


                <div class="grid grid-cols-3 gap-4 my-4">
                    <div class="flex flex-col gap-2">
                        <label>Service name:</label>
                        <input type="text" name="sp_name" id="sp_name"
                            class="w-full px-4 py-1 outline-none focus:outline-none border rounded-md"
                            placeholder="Service name..." required value="<?php echo $sp_name ?>">
                        <label>Service sales pitch:</label>
                        <input type="text" name="sp_sub_name" id="sp_sub_name" value="<?php echo $sp_sub_name ?>"
                            placeholder="Service sales pitch..."
                            class="w-full px-4 py-1 outline-none focus:outline-none border rounded-md">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="is_featured">Home Featured?</label>
                        <select name="is_featured" id="is_featured"
                            class="w-full px-4 py-1 outline-none focus:outline-none border rounded-md">
                            <option value="<?php echo $is_featured ?>"><?php echo $is_featured ?></option>
                            <?php
                            $option1 = $is_featured;
                            if ($option1 == 'Yes') {
                                $option2 = 'No';
                            } else {
                                $option2 = 'Yes';
                            }
                            ?>
                            <option value="<?php echo $option2 ?>"><?php echo $option2 ?></option>
                        </select>
                        <label for="book_url">Booking link:</label>
                        <input type="text" name="book_url" id="book_url"
                            class="w-full px-4 py-1 outline-none focus:outline-none border rounded-md"
                            placeholder="Booking link..." value="<?php echo $book_url ?>">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label>Excerpt:</label>
                        <textarea class="w-full px-4 py-1 outline-none focus:outline-none border z-0 rounded-md"
                            name="sp_short_description" id="sp_short_description" cols="30"
                            placeholder="A short description for displaying on featured page..."
                            rows="4"><?php echo $sp_short_description ?></textarea>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label>Description:</label>
                    <textarea class="w-full px-4 py-2 outline-none focus:outline-none border z-0" name="sp_description"
                        id="sp_description" cols="30" placeholder="Describe full details of this service..."
                        rows="10"><?php echo $sp_description ?></textarea>
                </div>
                <div class="grid grid-cols-4 gap-4 mt-4">
                    <div class="flex flex-col gap-2">
                        <label>Price list:</label>
                        <textarea class="w-full px-4 py-2 outline-none focus:outline-none border z-0" name="sp_price"
                            id="sp_price" cols="30" placeholder="Price List"
                            rows="10"><?php echo $sp_price ?></textarea>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label>Departure time:</label>
                        <textarea class="w-full px-4 py-2 outline-none focus:outline-none border z-0"
                            name="sp_departure_time" id="sp_departure_time" cols="30" placeholder="Departure Time"
                            rows="10"><?php echo $sp_departure_time ?></textarea>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label><?php echo $category_list ?> Included:</label>
                        <textarea class="w-full px-4 py-2 outline-none focus:outline-none border z-0"
                            name="sp_inclusion" id="sp_inclusion" cols="30" placeholder="Inclusion"
                            rows="20"><?php echo $sp_inclusion ?></textarea>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label>Terms and Conditions:</label>
                        <textarea class="w-full px-4 py-2 outline-none focus:outline-none border z-0" name="sp_notes"
                            id="sp_notes" cols="30" placeholder="Terms and Conditions"
                            rows="10"><?php echo $sp_notes ?></textarea>
                    </div>
                </div>
            </form>
            <?php if (!empty($ms)): ?>
                <div class="text-red-600 mt-4"><?php echo $ms; ?></div>
            <?php endif ?>
        </section>
    </div>
    <?php include 'footer.php' ?>