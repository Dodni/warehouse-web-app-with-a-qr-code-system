function ellenorizEsKuldes() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    if (checkboxes.length > 0) {
        var selectedProducts = [];
        checkboxes.forEach(function (checkbox) {
            var row = checkbox.closest('tr');
            var cells = row.querySelectorAll('td');
            var productData = [];
            cells.forEach(function (cell, index) {
                var content = cell.textContent.trim();
                if (index !== cells.length - 2) { // Kihagyja a letöltés oszlopot
                    productData.push(content);
                }
            });
            selectedProducts.push(productData.join(' | '));
        });

        var confirmed = confirm('Kijelölt termékek:\n' + selectedProducts.join('\n') + '\n\nBiztosan elküldi?');
        if (confirmed) {
            // Ide jöhet a további kód, ami a küldéshez szükséges
            console.log('Termékek elküldve!');
        } else {
            console.log('Elküldés megszakítva.');
        }
    } else {
        alert('Legalább egy terméket ki kell jelölni a küldéshez.');
    }
}