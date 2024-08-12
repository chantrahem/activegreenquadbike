async function fetchImages() {
    try {
        const response = await fetch('fetch_images_slide_show.php');

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const images = await response.json();
        return images;
    } catch (error) {
        console.error('Fetch error:', error);
        return [];
    }
}

async function startSlideshow() {
    const images = await fetchImages();
    if (images.length === 0) return;

    let index = 0;

    function showNextImage() {
        document.getElementById('slideshow').style.backgroundImage = `url('${images[index]}')`;
        index = (index + 1) % images.length;
    }

    showNextImage();
    setInterval(showNextImage, 5000); // Change image every 5 seconds
}

startSlideshow();