<?php
include 'header.php';

// Initialize message
$msg = "";

// Check if 'delete' parameter is present and sanitize user input
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $getuser = "SELECT * FROM users WHERE user_id=" . $user_id;
    $u_result = $db->query($getuser);
    $u_data = $u_result->fetch_assoc();
    $login_id = $u_data['user_id'];

    if ($login_id == $_SESSION['user_id']) {
        $msg = "This user is currently logged in; you cannot delete it.";
        echo renderModal($msg, 'user.php');
        exit();
    } else {
        $d_user = "DELETE FROM users WHERE user_id=" . $user_id;
        if ($db->query($d_user) === TRUE) {
            $msg = "The user is deleted successfully";
            echo renderModal($msg, 'user.php');
            exit();
        }else{
            $msg = "Error record: " .$db->error;
            echo renderModal($msg, 'user.php');
            exit();
        }
    }
}
function renderModal($message, $redirectUrl)
{
    return "
        <!-- Modal HTML -->
        <div id='popup' class='fixed inset-0 hidden bg-black bg-opacity-50 z-50'>
            <div class='absolute bg-white p-6 rounded-lg shadow-lg text-center'
                style='top: 50%; left: 50%; transform: translate(-50%, -50%);'>
                <p class='text-lg font-semibold'>$message</p>
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
                window.location.href = '$redirectUrl';
            }
        </script>
    ";
}
?>

<title>Users</title>
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
            <h1 class="text-2xl font-bold">Users</h1>
            <?php include 'sign-out.php' ?>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        <section class="p-4 mx-4 bg-white shadow rounded-lg">
            <div class="flex items-center">
                <button onclick="location.href='add_user.php'" class="btn-primary">Add New User</button>
            </div>
        </section>
        <section class="p-4 m-4 bg-white shadow rounded-lg">
            <div class="grid grid-cols-4 gap-4">
                <?php
                $user = "SELECT * FROM users";
                $user_result = $db->query($user);
                if ($user_result->num_rows > 0) {
                    while ($user_data = $user_result->fetch_assoc()) {
                        $user_id = $user_data['user_id'];
                        $user_fullname = $user_data['user_fullname'] ?: 'Undefined';
                        $user_email = $user_data['user_email'];
                        ?>
                        <div class="border rounded-md p-4 flex flex-col gap-2">
                            <div>Name: <?php echo htmlspecialchars($user_fullname); ?></div>
                            <div>Email: <?php echo htmlspecialchars($user_email); ?></div>
                            <div class="flex items-center gap-2">
                                <a href="edit_user.php?editid=<?php echo $user_id ?>"
                                    class="block text-white bg-green-600 rounded-md px-2 py-1 text-sm">Edit</a>
                                <a href="#" class="block text-white bg-red-500 rounded-md px-2 py-1 text-sm"
                                    data-id="<?php echo $user_id ?>" onclick="confirmDelete(this)">Delete</a>
                                <a href="change_user_password.php?change_id=<?php echo $user_id ?>"
                                    class="block text-white bg-gray-600 rounded-md px-2 py-1 text-sm">Change Password</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </section>
    </div>

    <!-- Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50">
        <div class="absolute bg-white p-6 rounded-lg shadow-lg text-center"
            style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <p class="text-xl font-bold mb-4">Are you sure you want to delete this user?</p>
            <div class="flex justify-center gap-4">
                <button id="confirmBtn" class="px-4 py-2 bg-red-500 text-white rounded">Yes</button>
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">No</button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(element) {
            const userId = element.getAttribute('data-id');
            const modal = document.getElementById('deleteModal');
            const confirmBtn = document.getElementById('confirmBtn');

            modal.classList.remove('hidden'); // Show modal

            confirmBtn.onclick = function () {
                window.location.href = `user.php?delete=${userId}`; // Redirect to delete
            };
        }

        function closeModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden'); // Hide modal
        }
    </script>

    <?php include 'footer.php' ?>