<!-- login_view.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Bejelentkezés</title>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div><h1>Bejelentkezés</h1></div>
    <div>
        <div>
            <form action="login" method="post">
            <input type="text" id="username" name="username" placeholder="Felhasználónév"><br>

            <input type="password" id="password" name="password" placeholder="Jelszó"><br><br>

            <input type="submit" value="bejelentkezes">
            </form>
        </div>
    </div>
</body>
<?php include 'footer_view.php'; ?>
</html>
