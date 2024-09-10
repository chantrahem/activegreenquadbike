<?php
ob_start();
session_start();
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../database/connection.php'; // Include database configuration

    $user = trim($_POST["user"]);
    $pass = trim($_POST["pass"]);

    if ((md5($user) == "9f706ab85924bd1aa5f9b3c79f7490bd") && (md5($pass) == "0fc29d43c79970f1d3fa34e0d08709de")) {
        // Master Admin login
        $_SESSION['loggedin'] = 'Master Admin';
        $_SESSION['UserID'] = '0';
        $_SESSION['user_fullname'] = 'Master Admin';
        header("Location: ../backend/dashboard.php");
        exit();
    } elseif (empty($user) && empty($pass)) {
        $errorMessage = "Please input username and password.";
    } elseif (empty($user)) {
        $errorMessage = "Please input username.";
    } elseif (empty($pass)) {
        $errorMessage = "Please input password.";
    } else {
        $pass = md5($pass); // Hash the password
        $stmt = $db->prepare("SELECT user_fullname, user_email, user_id FROM users WHERE user_email = ? AND user_password = ?");
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['loggedin'] = $row['user_email'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_fullname'] = $row['user_fullname'];
            header("Location: ../backend/dashboard.php");
            exit();
        } else {
            $errorMessage = "Incorrect username or password, please try again.";
        }
        $stmt->close();
    }
    $db->close();
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../sources/images/favicon.ico">
    <link href="../sources/css/style-out.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-gradient-to-b from-[#ff5050] to-[#3448ad] h-screen px-4 md:px-0 font-qrmms">
    <div class="w-full md:w-[400px] m-auto flex items-center h-screen">
        <div class="bg-white rounded-[10px] w-full py-4 px-4 md:py-12 md:px-8">
            <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <div class="text-[#3448ad] font-semibold text-xl">E-mail <span class="text-red-700">*</span></div>
                    <div class="">
                        <input
                            class="w-full border-b border-gray-400 bg-white px-2 py-2 outline-none rounded-md mb-4 md:mb-8 mt-2 text-sm"
                            type="text" name="user" id="user" placeholder="E-mail"
                            value="<?= htmlspecialchars(isset($_POST['user']) ? $_POST['user'] : ''); ?>">
                    </div>
                    <div class="text-[#3448ad] font-semibold text-xl">Password <span class="text-red-700">*</span></div>
                    <div class="">
                        <input
                            class="w-full border-b border-gray-400 bg-white px-2 py-2 outline-none rounded-md mb-4 md:mb-8 mt-2 text-sm"
                            type="password" name="pass" id="pass" placeholder="Password">
                    </div>
                    <div class="text-center">
                        <input
                            class="btn bg-[#3448ad] text-white px-6 py-2 rounded-md cursor-pointer" type="submit"
                            value="LOGIN">
                    </div>
                    <div class="text-center text-red-600 text-sm my-8">
                        <?php echo htmlspecialchars($errorMessage); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
