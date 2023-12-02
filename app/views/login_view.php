<!-- login_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" src="app/javascript/menu.js"></script>
    <script>
    function showAlert() {alert("Kérlek, vedd fel a kapcsolatot az üzemeltető kollégákkal az elfelejtett jelszó miatt.");}</script>
    <title>Bejelentkezés</title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div><h1>Bejelentkezés</h1></div>
    <div class="container">
        <div class="container">
            <?php echo $data['sikertelen']; ?>
            <?php if ($_GET['data']=="jelentkezzen-be-elobb") {
                echo "<h3>Jelentkezzen be elobb!</h3>";
            }?>
            <form action="login" method="post"> 
            <input type="text" id="username" name="username" placeholder="Felhasználónév"><br>
            <br>
            <input type="password" id="password" name="password" placeholder="Jelszó"><br><br>

            <input id="bejelentkezes" type="submit" value="bejelentkezes">
            </form>
            <br>
            <br>
            <br>
            <a href="#" onclick="showAlert()">Elfelejtett jelszó</a>
      </div>
    </div>
</body>
<?php include 'footer_view.php'; ?>
</html>
