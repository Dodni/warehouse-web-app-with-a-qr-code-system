<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" src="app/javascript/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Egyke Termék oldal</title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div class="container">
        <h1>Egyke Termék oldal</h1>
        <!-- ez kell -->
        <div id="qrcode-container"></div>
        <br>
        <button id="download-btn">Download QR code</button>
    </div>


<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script type="text/javascript">
    const QRElement = document.getElementById("qrcode-container");
    const qrCode = new QRCode(QRElement, "The Eagle Has Landed");

    document.getElementById('download-btn').addEventListener('click', function() {
        const qrCodeImage = QRElement.querySelector('img');
        const tempCanvas = document.createElement('canvas');
        const tempContext = tempCanvas.getContext('2d');

        tempCanvas.width = qrCodeImage.width;
        tempCanvas.height = qrCodeImage.height;
        tempContext.drawImage(qrCodeImage, 0, 0);

        const dataURL = tempCanvas.toDataURL('image/png');
        const downloadLink = document.createElement('a');
        downloadLink.href = dataURL;
        downloadLink.download = 'qrcode.png';
        downloadLink.click();
    });
</script>   
</body>
<?php include 'footer_view.php'; ?>
</html>
