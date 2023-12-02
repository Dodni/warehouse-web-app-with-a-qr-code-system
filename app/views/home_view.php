<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Főoldal</title>
    <script type="text/javascript" src="app/javascript/menu.js"></script>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div><h1>Főoldal</h1></div>
    <div class="container">
        <div class="container">
            <img src="public/img/qrcode.png" alt="Secret" width="250" height="250">
        </div>
    </div>
    <?php if ($_GET['data']=="mar-be-vagy-jelentkezve") {
        echo "<h3>Mar be van jelentkezve!</h3>";
    }
    ?>




</body>
<?php include 'footer_view.php'; ?>
</html>
