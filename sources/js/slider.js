let currentIndex = 0;
    const images = document.querySelectorAll('.slider-container img');
    const totalImages = images.length;

    // Function to change images
    function changeImage() {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % totalImages;
        images[currentIndex].classList.add('active');
    }

    // Change image every 5 seconds
    setInterval(changeImage, 5000);