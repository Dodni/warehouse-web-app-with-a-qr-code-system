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

</body>
<?php include 'footer_view.php'; ?>
</html>
