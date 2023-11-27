<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?php echo $dataSend['title']; ?></title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div class="container">
        <h1><?php echo $dataSend['title']; ?></h1>
    </div>
    <?php if ($_GET['data']=="sikeres") {echo "<h3>Sikeres bejelentkezes!</h3>";}?>
    <?php
    // Példa adatok tömbje (legfeljebb 25 sor)
    $termekAdatok = [
        [
            'azon' => 1,
            'teljes_nev' => 'Termék 1',
            'ewc_kod' => '01 02 03',
            'utolso_datum' => '2023-11-30',
            'darabszam' => 20,
            'osszes_suly' => 50
        ],
        [
            'azon' => 2,
            'teljes_nev' => 'Termék 2',
            'ewc_kod' => '04 05 06',
            'utolso_datum' => '2023-12-05',
            'darabszam' => 15,
            'osszes_suly' => 30
        ],
        [
            'azon' => 3,
            'teljes_nev' => 'Termék 3',
            'ewc_kod' => '07 08 09',
            'utolso_datum' => '2023-12-10',
            'darabszam' => 10,
            'osszes_suly' => 25
        ],
        // További termékek...
        // Ezt a részt az adatok betöltésére használnád az adatbázisból
    ];

    $oszlopNevek = ['AZON', 'Termék teljes neve', 'EWC kód', 'Utolsó Dátum', 'Darabszám', 'Összes súly', 'Kiválasztás'];
    ?>

    <table border="1">
        <thead>
            <tr>
                <?php foreach ($oszlopNevek as $oszlopNev) : ?>
                    <th><?= $oszlopNev ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php $sorSzamlalo = 0; ?>
            <?php foreach ($termekAdatok as $termek) : ?>
                <?php if ($sorSzamlalo < 25) : ?>
                    <tr>
                        <?php foreach ($termek as $value) : ?>
                            <td><?= $value ?></td>
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
</body>
<?php include 'footer_view.php'; ?>
</html>
