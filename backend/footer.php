<?php
$db->close();
?>
<script src="tinymce/tinymce.min.js"></script>
<script>

    tinymce.init({
        selector: '#sp_price, #sp_departure_time, #sp_description, #sp_inclusion, #sp_notes, #about_description, #myTextArea',
        menubar: false,
        statusbar: false,
        plugins: 'lists autoresize',
        toolbar: 'undo redo styles bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent'
    }
    );

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    function PreviewAboutImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadAboutImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadAboutPreview").src = oFREvent.target.result;
        };
    };

    function PreviewLogoImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadLogoImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadLogoPreview").src = oFREvent.target.result;
        };
    };

    function PreviewIconImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadIconImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadIconPreview").src = oFREvent.target.result;
        };
    };
</script>
</body>

</html>