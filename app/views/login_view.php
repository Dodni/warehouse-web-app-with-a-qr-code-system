<!-- login_view.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title']; ?></title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div><h1><?php echo $data['title']; ?></h1></div>
    <div>
        <div>
            <?php echo $data['sikertelen']; ?>
            <?php if ($_GET['data']=="jelentkezzen-be-elobb") {
                echo "<h3>Jelentkezzen be elobb!</h3>";
            }?>
            <form action="login" method="post"> 
            <input type="text" id="username" name="username" placeholder="Felhasználónév"><br>

            <input type="password" id="password" name="password" placeholder="Jelszó"><br><br>

            <input type="submit" value="bejelentkezes">
            </form>
            <a href="elfelejtett_jelszo.js">Elfelejtett jelszó</a>
        </div>
    </div>
</body>
<?php include 'footer_view.php'; ?>
</html>
