<!-- egyke_termek_view.php -->
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
    <div><h1>Egyke termék oldal</h1></div>
    <div class="container">
        <?php 
            session_start();
            var_dump($_SESSION['dataSenden']);
            if ($_SESSION['dataSenden'] != null) {
                foreach ($_SESSION['dataSenden']  as $item) {
                    echo "<div class='product'>";
                    foreach ($item as $key => $value) {
                        if ($key === "termek_logisztikara_kuldve" && $value === "0") {
                            echo "<b>$key:</b> Nem<br>";
                        } else {
                            echo "<b>$key:</b> $value<br>";
                        }
                    }
                    echo "</div><br>";
                }
                
            }
        ?>
    </div>
    <div id="qrcode-container"></div>
    <script type="text/javascript">
        var termekId = <?php echo json_encode($_SESSION['dataSenden']['0']["termek_id"]); ?>;
        new QRCode(document.getElementById("qrcode-container"), 'http://localhost/qr_kod_app/egyke_termek/' + termekId);
    </script>
    <a href="#" class="qr-link">Letöltés</a>
    <?php $_SESSION['dataSenden']=null;?>
</body>
<?php include 'footer_view.php'; ?>
</html>