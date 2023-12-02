<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" src="app/javascript/menu.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Raktárkészlet - Új termék hozzáadása</title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div><h1>Raktárkészlet</h1></div>
    <div><h3>Új termék hozzáadása</h3></div>
    <div class="container">
        <form id="productForm" method="post" action="TermekInfoAPI/postTermek/">
            <input type="text" name="termek_nev" placeholder="Termék neve" required minlength="5" maxlength="50"><br><br>
            <input type="text" name="termek_szarmazas" placeholder="Származás" required minlength="5" maxlength="50"><br><br>
            <input type="date" name="termek_erkezesi_datum" placeholder="Érkezési Dátum" required><br><br>
            <input type="text" name="termek_ewc_kod" placeholder="EWC kód" required><br><br>
            <input type="number" name="termek_darabszam" placeholder="Darab" required><br><br>
            <input type="number" name="termek_suly" step="0.01" placeholder="Súly" required min="1" max="9999"><br><br>
            <input type="text" name="termek_kep_neve" placeholder="Kép feltöltés (most kép neve)" required><br><br>
            <button type="button" id="submitForm">Termék hozzáadása</button>
            <button type="button" onclick="window.history.back()">Mégse</button>
        </form>
    </div>
    <div>
</div>
<script>
    $(document).ready(function() {
        $('#submitForm').click(function() {
            var formData = $('#productForm').serialize(); // Az űrlap adatainak összegyűjtése

            $.ajax({
                url: 'TermekInfoAPI/postTermek/',
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Sikeres kérés!', response);
                    // Sikeres válasz esetén irányíts át az elozo oldalra
                    window.history.back();
                },
                error: function(xhr, status, error) {
                    console.error('Hiba a kérésben!', error);
                    // Itt lehet a hiba kezelése
                }
            });
        });
    });
</script>
</body>
<?php include 'footer_view.php'; ?>
</html>
