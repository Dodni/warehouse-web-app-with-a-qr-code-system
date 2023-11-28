<!-- home_view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <script type="text/javascript" src="app/javascript/menu.js"></script>
    <script type="text/javascript" src="app/javascript/keresesTabla.js"></script>
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
        <div class="horizontal-container">
            <button onclick="exportSelected()">Excel letöltése</button>
            <input type="text" placeholder="Keresés">
            <button>Új termék hozzáadása</button>
        </div>
        <div class="container">
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
        
    </div>  
    <script>
        function exportSelected() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            if (checkboxes.length === 0) {
                alert('Nincs kijelölt termék.');
                return;
            }

            const selectedProducts = [];
            // Fejléc hozzáadása
            const headerRow = Array.from(document.querySelectorAll('th')).map(th => th.textContent.trim());
            selectedProducts.push(headerRow.join(','));

            checkboxes.forEach(function (checkbox) {
                const row = checkbox.closest('tr');
                const cells = row.querySelectorAll('td');
                const productData = [];
                cells.forEach(function (cell) {
                    if (cell.textContent.trim() !== 'Kiválasztás') {
                        productData.push(cell.textContent.trim());
                    }
                });
                selectedProducts.push(productData.join(','));
            });

            const csvContent = selectedProducts.join('\n');
            const blob = new Blob([csvContent], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);

            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'exported_data.csv');
            document.body.appendChild(link);
            link.click();

            document.body.removeChild(link);
        }

        // Adatok betöltése a táblázatba
        const termekAdatok = <?= json_encode($termekAdatok) ?>;
        const tableBody = document.getElementById('termekTabla');
        termekAdatok.forEach(termek => {
            const row = document.createElement('tr');
            Object.keys(termek).forEach(key => {
                const cell = document.createElement('td');
                if (key === 'termek_nev') {
                    const link = document.createElement('a');
                    link.href = `/qr_kod_app/raktarkeszlet_csoportositott_termek?ewc_kod=${termek['termek_ewc_kod']}`;
                    link.textContent = termek[key];
                    cell.appendChild(link);
                } else if (key !== 'Kiválasztás') {
                    cell.textContent = termek[key];
                }
                row.appendChild(cell);
            });
            const checkboxCell = document.createElement('td');
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkboxCell.appendChild(checkbox);
            row.appendChild(checkboxCell);
            tableBody.appendChild(row);
        });
    </script>
</body>
<?php include 'footer_view.php'; ?>
</html>
