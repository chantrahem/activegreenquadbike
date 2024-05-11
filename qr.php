<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
</head>
<body>
    <div class="qr-wrap" id="qr-wrap">
        <div class="flex-center">
            <div class="qrcode">
                <img id="qrimg" alt='QR Code' width='240' height='240'>
            </div>
        </div>
    </div>

    <button onclick="generatePDF()">Download QR Code</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        const link = "Your link here"; // Replace 'Your link here' with your actual link
        const qrUrl = `https://chart.googleapis.com/chart?cht=qr&chs=240x240&chl=${link}&choe=UTF-8`;

        document.getElementById('qrimg').setAttribute('src', qrUrl);

        function generatePDF() {
            const element = document.getElementById('qr-wrap');
            var opt = {
                margin: 0,
                padding: 0,
                filename: 'QR_Code.pdf',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a5',
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
