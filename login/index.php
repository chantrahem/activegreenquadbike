<?php
ob_start();
session_start();
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../database/connection.php'; // Include database configuration

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    if ((md5($user) == "9f706ab85924bd1aa5f9b3c79f7490bd") && (md5($pass) == "0fc29d43c79970f1d3fa34e0d08709de")) {
        // Master Admin login
        $_SESSION['loggedin'] = 'Master Admin';
        $_SESSION['UserID'] = '0';
        header("Location: ../backend");
        exit();
    } elseif (empty($user) && empty($pass)) {
        $errorMessage = "Please input username and password.";
    } elseif (empty($user)) {
        $errorMessage = "Please input username.";
    } elseif (empty($pass)) {
        $errorMessage = "Please input password.";
    } else {
        $pass = md5($_POST["pass"]);
        $query = "SELECT * FROM users WHERE user_name = '$user' AND user_password = '$pass'";
        $result = $db->query($query);

        if ($result && $result->num_rows > 0) {
            $_SESSION['loggedin'] = $user_display_name;
            $_SESSION['user_id'] = $user_id;
            header("Location: ../backend");
            exit();
        } else {
            $errorMessage = "Incorrect username or password, please try again.";
        }
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

<!-- Login  with database MSQL -->

<body class="bg-gradient-to-b from-[#ff5050] to-[#3448ad] h-screen px-4 md:px-0 font-qrmms">
    <div class="w-full md:w-[400px] m-auto flex items-center h-screen">
        <div class="bg-white rounded-[10px] w-full py-4 px-4 md:py-12 md:px-8">
            <!-- <div class="text-center text-2xl md:text-4xl pb-4 md:pb-8 font-semibold text-[#3448ad]">
                <div>សូមស្វាគមន៍</div>
                <div class="text-sm">Welcome</div>
            </div> -->
            <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <div class="text-[#3448ad] font-semibold text-xl">Username:</div>
                    <div class=""><input
                            class="w-full border-b border-gray-400 bg-white px-2 py-2 outline-none rounded-md mb-4 md:mb-8 mt-2 text-sm"
                            type="text" name="user" id="user" placeholder="username"
                            value="<?= isset($_POST['user']) ? $_POST['user'] : ''; ?>"></div>
                    <div class="text-[#3448ad] font-semibold text-xl">Password:</div>
                    <div class=""><input
                            class="w-full border-b border-gray-400 bg-white px-2 py-2 outline-none rounded-md mb-4 md:mb-8 mt-2 text-sm"
                            type="password" name="pass" id="pass" placeholder="password"></div>
                    <div class="text-center"><input
                            class="btn bg-[#3448ad] text-white px-6 py-2 rounded-md cursor-pointer" type="submit"
                            value="LOGIN"></div>
                    <div class="text-center text-red-600 text-sm my-8">
                        <?php echo $errorMessage; ?>
                    </div>
                </div>
            </form>
            <!-- <div class="text-center text-sm">
                <div>ដំណើរការដោយ</div>
                <div class="text-[12px] -mt-2">Powered by</div>
                <a href="http://qrmms.com/" target="_blank" rel="noopener noreferrer">
                    <img class="w-[85px] m-auto" src="../assets/logo/logo-grey.png" alt="QRMMS">
            </div> -->
        </div>
    </div>
    </div>
</body>

</html>