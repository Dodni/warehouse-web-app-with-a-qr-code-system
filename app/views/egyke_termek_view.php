<!-- egyke_termek_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/style.css">
    <script type="text/javascript" src="<?php echo BASE_URL ?>app/javascript/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Egyke Termék oldal</title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div><h1>Egyke termék oldal</h1></div>
    <div class="container">
        <div >
            <?php 
                session_start();
                #var_dump($_SESSION['dataSenden']);
                if ($_SESSION['dataSenden'] != null) {
                    foreach ($_SESSION['dataSenden'] as $item) {
                        echo "<div class='product'>";
                        foreach ($item as $key => $value) {
                            $formatted_key = str_replace('_', ' ', $key); // Szóközök beszúrása az _ jelek helyett
                            if ($key === "termek_logisztikara_kuldve" && $value === "0") {
                                echo "<b>$formatted_key:</b><p class='product-p'>Nem</p><br>";
                            } else {
                                echo "<b>$formatted_key:</b><p class='product-p'>$value</p><br>";
                            }
                        }
                    }
                    echo "<br><br><br>";
                    echo "<b>Szállítási dátum:</b><p class='product-p'>Nem elérhető</p><br>";
                    echo "<b>Szállítási cím:</b><p class='product-p'>Nem elérhető</p>";
                    echo "</div><br>";
                }
            ?>
        </div>
        <div id="qrcode-container"></div>
        <br>
        <a href="<?php echo BASE_URL?>egyke_termek/<?php echo $_SESSION['dataSenden']['0']["termek_id"]?>" class="qr-link">Letöltés</a>
        <br>
    </div>
    <script type="text/javascript">
        var termekId = <?php echo json_encode($_SESSION['dataSenden']['0']["termek_id"]); ?>;
        new QRCode(document.getElementById("qrcode-container"), 'http://localhost/qr_kod_app/egyke_termek/' + termekId);
    </script>
    <?php $_SESSION['dataSenden']=null;?>
</body>
<?php include 'footer_view.php'; ?>
</html>

    <div class="container" style="display: none;">
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



    </script>