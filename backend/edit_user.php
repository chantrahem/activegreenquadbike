<?php
include 'header.php';
$sms = '';
$editid = isset($_GET['editid']) ? intval($_GET['editid']) : 0;
$user = "SELECT * FROM users WHERE user_id = $editid";
$result = $db->query($user);
$data = $result->fetch_assoc();
$user_fullname = $data['user_fullname'];
$user_email = $data['user_email'];

//handle update user
if (isset($_POST['update-user'])) {
    $user_fullname = ($_POST['user_fullname']);
    $user_email = ($_POST['user_email']);
    if (empty($user_fullname)) {
        $sms = 'Please input user full name';
    } elseif (empty($user_email)) {
        $sms = 'Please input email';
    } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $sms = 'Please enter a valid email';
    } else {
        $email = "SELECT * FROM users WHERE user_email = '$user_email' AND user_id != $editid";
        $e_result = mysqli_query($db, $email);
        $count = mysqli_num_rows($e_result);
        if ($count >= 1) {
            $sms = 'Username email already exists, please change the alternative one.';
        } else {
            $update = "UPDATE users SET user_fullname='$user_fullname', user_email='$user_email' WHERE user_id = $editid";
            if ($db->query($update) === TRUE) {
                $sms = "Updated successfully";
            } else {
                $sms = "Something went wrong, please check: " . $db->error;
            }
        }
    }
}
?>

<title>Edit User</title>
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
            <h1 class="text-2xl font-bold">Edit User</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg w-[350px]">
            <form action="" method="POST" enctype="multipart/form-data" id="userForm" class="flex flex-col gap-2">
                <label for="user_fullname">Full name:</label>
                <input type="text" class="w-full px-4 py-1 outline-none focus:outline-none border rounded-md"
                    id="user_fullname" name="user_fullname" value="<?php echo $user_fullname; ?>">

                <label for="user_email">Email:</label>
                <input type="email" class="w-full px-4 py-1 outline-none focus:outline-none border rounded-md"
                    id="user_email" name="user_email" value="<?php echo $user_email; ?>">
                <div class="flex gap-2">
                    <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-1 px-4 uppercase mt-4" type="submit"
                        name="update-user">Update</button>
                    <a href='user.php'"
                        class=" bg-gray-500 hover:bg-[#0791BE] text-white py-1 px-4 uppercase mt-4"
                        name="cancel">Cancel</a>
                </div>
            </form>
        </section>
    </div>

    <!-- Modal for Messages -->
    <?php if (!empty($sms)): ?>
        <div id="messageModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm w-full">
                <h2 class="text-2xl font-bold mb-4">Message</h2>
                <p class="mb-4"><?php echo $sms; ?></p>
                <button id="closeButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Close
                </button>
            </div>
        </div>

        <script>
            document.getElementById('closeButton').addEventListener('click', function () {
                // Hide the popup
                document.getElementById('messageModal').style.display = 'none';
                // Refresh or redirect only if the update was successful
                <?php if ($sms == "Updated successfully"): ?>
                    window.location.href = 'user.php';
                <?php endif; ?>
            });
        </script>
    <?php endif; ?>
</body>

</html>