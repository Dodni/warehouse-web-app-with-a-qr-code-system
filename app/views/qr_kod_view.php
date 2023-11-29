<!-- home_view.php -->
<!-- Felhasznalt kulso forras: https://openjavascript.info/2022/12/10/qr-code-scanner-with-html5-qrcode-js/ -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" src="app/javascript/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>QR kód</title>
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #reader {
            width: 600px;
        }
        #result {
            text-align: center;
            font-size: 1.5rem;
        }
    </style>
</head>
<?php include 'header_view.php'; ?>
<body>
    <div><h1>QR-kód olvasó</h1></div>
    <div class="container">

        <main>
            <div id="reader"></div>
            <div id="result"></div>
        </main>

        <script>

            const scanner = new Html5QrcodeScanner('reader', { 
                // Scanner will be initialized in DOM inside element with id of 'reader'
                qrbox: {
                    width: 250,
                    height: 250,
                },  // Sets dimensions of scanning box (set relative to reader element width)
                fps: 20, // Frames per second to attempt a scan
            });

            scanner.render(success, error);
            // Starts scanner

            function success(result) {

                document.getElementById('result').innerHTML = `
                <h2>Success!</h2>
                <p><a href="${result}">${result}</a></p>
                `;
                // Prints result as a link inside result element

                scanner.clear();
                // Clears scanning instance

                document.getElementById('reader').remove();
                // Removes reader element from DOM since no longer needed
            
            }

            function error(err) {
                console.error(err);
                // Prints any errors to the console
            }

        </script>
    </div>
</body>
<?php include 'footer_view.php'; ?>
</html>


