<?php 
include 'header.php';
$sms = "";
$user_fullname = ""; // Initialize variable to retain form data
$user_email = ""; // Initialize variable to avoid undefined variable notice

if (isset($_POST['add-user'])) {
    // Store the submitted values
    $user_fullname = $_POST["user_fullname"];
    $user_email = $_POST["user_email"];

    // Validation
    if (empty($user_fullname)) {
        $sms = 'Please enter user full name';
    } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $sms = 'Please enter a valid email';
    } elseif (empty($_POST["user_password"])) {
        $sms = 'Please enter Password';
    } elseif (strlen($_POST["user_password"]) < 6) {
        $sms = 'Password must be at least 6 characters long.'; // Check password length
    } else {
        $user_password = md5($_POST["user_password"]);
        $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);
        if ($count >= 1) {
            $sms = 'Username email already exists.';
        } else {
            $insert = "INSERT IGNORE INTO `users`(`user_fullname`, `user_email`, `user_password`)
                              VALUES ('$user_fullname', '$user_email', '$user_password')";
            if ($db->query($insert) === TRUE) {
                $sms = "User created successfully";
                echo "<script>
                    window.onload = function() {
                        document.getElementById('messageModal').style.display = 'flex';
                    };
                </script>";
            } else {
                $sms = "Error creating record: " . $db->error;
            }
        }
    }
}
?>

<title>Add User</title>
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
            <h1 class="text-2xl font-bold">Add new user</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg w-[350px]">
            <form action="" method="POST" enctype="multipart/form-data" id="userForm" class="flex flex-col gap-4">
                <label for="user_fullname">Full name:</label>
                <input type="text" class="w-full px-4 py-1 outline-none focus:outline-none border rounded-md"
                    id="user_fullname" name="user_fullname" value="<?php echo htmlspecialchars($user_fullname); ?>" required placeholder="Full name">

                <label for="user_email">Email:</label>
                <input type="email" class="w-full px-4 py-1 outline-none focus:outline-none border rounded-md"
                    id="user_email" name="user_email" value="<?php echo htmlspecialchars($user_email); ?>" required placeholder="Email">

                <label for="user_password">Password:</label>
                <input type="password" class="w-full px-4 py-1 outline-none focus:outline-none border rounded-md"
                    id="password" name="user_password" required minlength="6"
                    placeholder="Password (at least 6 characters)">
                <button class="bg-[#F56960] hover:bg-[#0791BE] text-white py-1 px-4 uppercase mt-10" type="submit"
                    name="add-user">Add Now</button>
            </form>
        </section>
    </div>

    <!-- Modal for Messages -->
    <?php if (!empty($sms)) : ?>
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
            document.getElementById('closeButton').addEventListener('click', function() {
                // Hide the popup
                document.getElementById('messageModal').style.display = 'none';
                <?php if ($sms === "User created successfully") : ?>
                    // Redirect on success
                    window.location.href = 'user.php';
                <?php endif; ?>
            });
        </script>
    <?php endif; ?>

    <?php include 'footer.php' ?>
