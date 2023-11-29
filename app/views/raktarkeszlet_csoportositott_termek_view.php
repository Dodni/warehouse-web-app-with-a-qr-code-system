<!-- raktarkeszletcsoportositotttermek_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" src="app/javascript/menu.js"></script>
    <script type="text/javascript" src="app/javascript/ellenorizEsKuld.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <title>Rólunk</title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <?php
    session_start();
    $termekAdatok = $_SESSION["dataToSend"];
    ?>

    <div class="container">
        <h1>Raktárkészlet</h1>
        <h3>[csoportositott termek neve]</h3>
        <button onclick="ellenorizEsKuldes()">Küldés a logisztikára</button>

        <div class="container">
            <table border="1">
                <thead>
                    <tr>
                        <?php
                        $oszlopNevek = [
                            'AZON',
                            'Termék teljes neve',
                            'Származás',
                            'Dátum',
                            'EWC kód',
                            'Darabszám',
                            'Súly (kg)',
                            'QR-kód'
                        ];

                        foreach ($oszlopNevek as $oszlopNev) {
                            echo "<th>$oszlopNev</th>";
                        }
                        ?>
                        <th>Kijelölés</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sorSzamlalo = 0;
                    foreach ($termekAdatok as $termek) {
                        if ($sorSzamlalo < 25) {
                            echo "<tr>";

                            foreach ($termek as $key => $value) {
                                if ($key === 'termek_logisztikara_kuldve') {
                                    echo "<td><a class='qr-link' href='#'>Letöltés</a></td>";
                                } elseif ($key === 'termek_nev') {
                                    echo "<td><a href='#'>$value</a></td>";
                                } else {
                                    echo "<td>$value</td>";
                                }
                            }

                            echo "<td><input type='checkbox'></td></tr>";
                            $sorSzamlalo++;
                        } else {
                            break;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container" style="display: none;>
        <input type="text" id="user-input">
        <button id="btn">Generate QR code!</button>
        <div id="qrcode-container" style="display: none;"></div>
        <a id="download-link" style="display: none;"></a>
    </div>

    <script type="text/javascript">
        const qrLinks = document.querySelectorAll('.qr-link');
        qrLinks.forEach(function(qrLink) {
            qrLink.addEventListener('click', function(event) {
                event.preventDefault(); // Megakadályozza az alapértelmezett linkműködést

                const link = event.target;
                const qrText = link.getAttribute('href'); // Az "a" elem href attribútumának értéke

                // QR kód létrehozása
                const qr = new QRCode("qrcode-container", {
                    text: qrText,
                    width: 128,
                    height: 128,
                });

                // QR kód letöltése
                const canvas = document.querySelector("#qrcode-container canvas");
                const dataUrl = canvas.toDataURL("image/png");

                const downloadLink = document.createElement("a");
                downloadLink.href = dataUrl;
                downloadLink.download = "qr_code.png";
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            });
        });

        document.getElementById('btn').addEventListener('click', function() {
            const text = document.getElementById('user-input').value;
            const qrCodeContainer = document.getElementById("qrcode-container");
            qrCodeContainer.innerHTML = ''; // Clear previous QR code if any

            const qrCode = new QRCode(qrCodeContainer, text);
            qrCode.makeCode(text);

            // A QR-kód méretének beállítása (opcionális)
            qrCodeContainer.style.width = qrCodeContainer.offsetWidth + 'px';

            // Várj egy kicsit a képkészítésre
            setTimeout(function() {
                showDownloadLink();
            }, 500); // Változtatható várakozási idő
        });

        function showDownloadLink() {
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