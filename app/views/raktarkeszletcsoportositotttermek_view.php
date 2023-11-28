<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" src="app/javascript/menu.js"></script>
    <title>Rólunk</title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div class="container">
        <h1>Raktárkészlet</h1>
        <h3>[csoportositott termek neve]</h3>
        <button>Küldés a logisztikára</button>
        <?php
        // Teszt adatok létrehozása
        $termekAdatok = [
            [
                'azon' => '1',
                'termek_nev' => 'Termék 1',
                'szarmazas' => 'Ország 1',
                'darabszam' => 10,
                'suly' => 5.2,
                'ewc_kod' => 'EWC123',
                'datum' => '2023-11-01',
            ],
            [
                'azon' => '2',
                'termek_nev' => 'Termék 2',
                'szarmazas' => 'Ország 2',
                'darabszam' => 8,
                'suly' => 7.5,
                'ewc_kod' => 'EWC456',
                'datum' => '2023-11-05',
            ],
            // ... további termékek
        ];

        // Fejléc oszlopnevei
        $oszlopNevek = [
            'AZON',
            'Termék teljes neve',
            'Származás',
            'Darabszám',
            'Súly (kg)',
            'EWC kód',
            'Dátum',
        ];
        ?>
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
                                <?php if ($key === 'termek_nev') : ?>
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
</body>
<?php include 'footer_view.php'; ?>
</html>
