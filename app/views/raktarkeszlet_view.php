<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" src="app/javascript/menu.js"></script>
    <title><?php echo $dataSend['title']; ?></title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <?php if ($_GET['data']=="sikeres") {echo "<h3>Sikeres bejelentkezes!</h3>";}?>
    <?php
    // Példa adatok tömbje (legfeljebb 25 sor)
    session_start();
    $termekAdatok = $_SESSION["datasend"];
    #var_dump($termekAdatok);
    $oszlopNevek = ['Termék teljes neve', 'EWC kód', 'Utolsó Dátum', 'Darabszám', 'Összes súly', 'Kiválasztás'];
    ?>
    <div class="container">
        <h1><?php echo $dataSend['title']; ?></h1>
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
                            <?php foreach ($termek as $key => $value) : ?>
                                <?php if ($key === 'termek_nev') : ?>
                                    <td><a href="/qr_kod_app/raktarkeszlet_csoportositott_termek?ewc_kod=<?= $termek['termek_ewc_kod'] ?>"><?= $value ?></a></td>
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
