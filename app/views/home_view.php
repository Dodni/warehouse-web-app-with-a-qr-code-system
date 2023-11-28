<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Főoldal</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navMenu = document.querySelector('.nav-menu');

            menuToggle.addEventListener('click', () => {
                navMenu.classList.toggle('show-menu');
            });
        });
    </script>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div class="container">
        <h1>Főoldal</h1>
        <h1>Üdvözöljük a világot!</h1>
        <p>Ez a világ legjobb nézete!</p>
    </div>
    <?php if ($_GET['data']=="mar-be-vagy-jelentkezve") {
        echo "<h3>Mar be van jelentkezve!</h3>";
    }
    ?>




</body>
<?php include 'footer_view.php'; ?>
</html>
