<?php include 'header.php' ?>
<title>Dashboard</title>
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
            <h1 class="text-2xl font-bold">Welcome</h1>
            <div>
                <button onclick="location.href='../logout'" class="text-white rounded-lg">
                <span class="icon-[mdi--sign-out]" style="width: 24px; height: 24px;"></span>
                </button>
            </div>
        </header>
        <div class="" style="height: 80px;">&nbsp;</div>
        </div>
    
    <?php include 'footer.php' ?>