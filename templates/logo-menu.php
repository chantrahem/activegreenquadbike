<div id="stickyMenu">
    <div
        class="w-full lg:w-[1200px] m-auto flex items-center justify-between py-2 px-4 lg:px-0 bg-[#f2f2f2] lg:bg-transparent">
        <!-- logo -->
        <div class="flex justify-center">
            <img class="logo cursor-pointer h-[45px] lg:h-[100px]" src="/sources/images/<?php echo $logo; ?>"
                alt="Active Green Quad Bike" onclick="location.href='/'">
        </div>
        <!-- Main Menu -->
        <div class="hidden lg:block">
            <nav class="main-menu">
                <?php include 'menu.php' ?>
            </nav>
        </div>
        <!-- Hamburger -->
        <div onclick="showSidebar()" class="block lg:hidden cursor-pointer">
            <div class="bg-red-400 w-8 h-1 rounded-full">&nbsp;</div>
            <div class="bg-red-400 w-6 h-1 rounded-full my-1">&nbsp;</div>
            <div class="bg-red-400 w-8 h-1 rounded-full">&nbsp;</div>
        </div>
    </div>
</div>

<div id="sidebar" class="bg-gray-500 text-white fixed top-0 right-0 w-full h-screen lg:w-[450px] lg:right-0 z-50"
    style="display:none;">
    <div class="flex items-center justify-between p-4 bg-gray-700 text-white">
        <div>
            <div class="text-xl">MENU</div>
        </div>
        <div class="flex items-center cursor-pointer" onclick="showSidebar()">
            <span class="icon-[ic--baseline-close]" style="width: 24px; height: 24px;"></span>
        </div>
    </div>
    <nav class="sidebar-menu">
        <?php include 'menu.php' ?>
    </nav>
</div>