// Kereső funkció
document.addEventListener('DOMContentLoaded', function () {
    const input = document.querySelector('input[type="text"]');
    const rows = document.querySelectorAll('tbody tr');

    input.addEventListener('input', function () {
        const searchTerm = input.value.toLowerCase();

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let found = false;

            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                    found = true;
                }
            });

            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});