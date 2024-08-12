   // Get the button
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () { scrollFunction() };
    var header = document.getElementById("stickyMenu");
    var sticky = header.offsetTop;
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        //scroll sticky menu
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
            header.classList.remove("bg-menu");
        } else {
            header.classList.remove("sticky");
            header.classList.add("bg-menu");
        }


    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }


    //Mobile Menu show/hide

    function showSidebar() {
        var x = document.getElementById("sidebar");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }