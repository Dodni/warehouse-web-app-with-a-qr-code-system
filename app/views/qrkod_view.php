<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>QR kód</title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div class="container">
        <h1>QR kód</h1>
    </div>
 

<label for="user-input">Enter QR code data: </label>
<input type="text" id="user-input">
<button id="btn">Generate QR code!</button>
<div id="qrcode-container"></div>
<a id="download-link" style="display: none;">Download QR code</a>

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script type="text/javascript">
    document.getElementById('btn').addEventListener('click', createQRCode);

    function createQRCode() {
        const text = document.getElementById('user-input').value;
        const qrCodeContainer = document.getElementById("qrcode-container");
        qrCodeContainer.innerHTML = ''; // Clear previous QR code if any

        const qrCode = new QRCode(qrCodeContainer, text);
        qrCode.makeCode(text);

        // A QR-kód méretének beállítása (opcionális)
        qrCodeContainer.style.width = qrCodeContainer.offsetWidth + 'px';

        // Várj egy kicsit a képkészítésre
        setTimeout(function() {
            showDownloadLink(qrCode);
        }, 500); // Változtatható várakozási idő
    }

    function showDownloadLink(qrCode) {
        const downloadLink = document.getElementById('download-link');
        downloadLink.style.display = 'block';
        const qrCodeImage = document.querySelector('#qrcode-container img');

        // Create a temporary canvas to draw the QR code
        const tempCanvas = document.createElement('canvas');
        const tempContext = tempCanvas.getContext('2d');
        tempCanvas.width = qrCodeImage.width;
        tempCanvas.height = qrCodeImage.height;
        tempContext.drawImage(qrCodeImage, 0, 0);

        // Convert the canvas to a data URL
        const dataURL = tempCanvas.toDataURL('image/png');

        // Set the data URL as the href attribute of the download link
        downloadLink.href = dataURL;
        downloadLink.download = 'qrcode.png';
    }

    document.getElementById('download-link').addEventListener('click', function() {
        // Automatically revoke the Object URL after the download link is clicked
        URL.revokeObjectURL(this.href);
    });
</script>
    

    
</body>
<?php include 'footer_view.php'; ?>
</html>

