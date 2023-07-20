<script src="{{ asset('Template/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('Template/assets/js/app.js') }}"></script>

<script src="{{ asset('Template/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('Template/assets/js/pages/simple-datatables.js') }}"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

{{-- Script for search bar --}}
<script>
    // Get the search input element
    const searchInput = document.getElementById('searchInput');

    // Add an event listener for the input event
    searchInput.addEventListener('input', function(event) {
        const searchText = event.target.value.toLowerCase();
        const rows = document.querySelectorAll('.bg-white tr');

        // Iterate over each row and check if it matches the search text
        rows.forEach(function(row) {
            const studentId = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
            const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            const faculty = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
            const course = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
            const role = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

            // Show or hide the row based on the search text
            if (studentId.includes(searchText) || name.includes(searchText) || email.includes(
                    searchText) ||
                faculty.includes(searchText) || course.includes(searchText) || role.includes(searchText)
                ) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
