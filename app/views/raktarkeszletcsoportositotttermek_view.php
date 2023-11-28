<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" src="app/javascript/menu.js"></script>
    <script type="text/javascript" src="app/javascript/ellenorizEsKuld.js"></script>
    <title>Rólunk</title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div class="container">
        <h1>Raktárkészlet</h1>
        <h3>[csoportositott termek neve]</h3>
        <button onclick="ellenorizEsKuldes()">Küldés a logisztikára</button>
        <?php
        session_start();
        $termekAdatok = $_SESSION["dataToSend"];
        #var_dump($_SESSION["dataToSend"]);
        // Fejléc oszlopnevei
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
        ?>
<div class="container">
    <table border="1">
        <thead>
            <tr>
                <?php foreach ($oszlopNevek as $oszlopNev) : ?>
                    <th><?= $oszlopNev ?></th>
                <?php endforeach; ?>
                <th>Kijelölés</th>
            </tr>
        </thead>
        <tbody>
            <?php $sorSzamlalo = 0; ?>
            <?php foreach ($termekAdatok as $termek) : ?>
                <?php if ($sorSzamlalo < 25) : ?>
                    <tr>
                        <?php foreach ($termek as $key => $value) : ?>
                            <?php if ($key === 'termek_logisztikara_kuldve') : ?>
                                <td><a href="#">Letöltés</a></td>
                            <?php elseif ($key === 'termek_nev') : ?>
                                <td><a href="#"><?= $value ?></a></td>
                            <?php else : ?>
                                <td><?= $value ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <td><input type="checkbox"></td>
                    </tr>
                    <?php $sorSzamlalo++; ?>
                <?php else : ?>
                    <?php break; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
        
    </div>
</body>
<?php include 'footer_view.php'; ?>
</html>
