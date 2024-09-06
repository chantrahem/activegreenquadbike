    let currentIndex = 0;
    const images = <?php echo json_encode($images); ?>;

    function openPopup(index) {
        currentIndex = index;
        const popup = document.getElementById('popup');
        const popupImg = document.getElementById('popup-img');
        
        popupImg.src = images[currentIndex];
        popup.classList.remove('hidden');
    }

    function closePopup() {
        const popup = document.getElementById('popup');
        popup.classList.add('hidden');
    }

    function changeImage(direction) {
        currentIndex += direction;
        
        if (currentIndex < 0) {
            currentIndex = images.length - 1;
        } else if (currentIndex >= images.length) {
            currentIndex = 0;
        }

        const popupImg = document.getElementById('popup-img');
        popupImg.src = images[currentIndex];
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closePopup();
        } else if (event.key === 'ArrowLeft') {
            changeImage(-1);
        } else if (event.key === 'ArrowRight') {
            changeImage(1);
        }
    });
