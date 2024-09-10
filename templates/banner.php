<div class="w-full h-screen absolute top-0 text-white">
    <?php
    include 'templates/top-bar.php';
    include 'templates/logo-menu.php';
    ?>
    <div class="w-full lg:w-[1200px] m-auto">
        <div class="h-screen w-full lg:w-[900px] flex items-center px-4 lg:px-0">
            <div>
                <h1 class="text-4xl lg:text-6xl font-bold uppercase mb-8 text-center lg:text-left">
                    <?php echo $about_highlight; ?>
                </h1>
                <p class="text-center lg:text-left"><?php echo $short_description; ?></p>
                <div class="flex items-center mt-8 space-x-4  justify-center lg:justify-start">
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 text-sm">
                        <button onclick="location.href='/programs.php'" class="btn-primary">
                            Jeep Programs</button>
                        <button onclick="location.href='/gallery.php'" class="btn-primary">
                            Gallery</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>