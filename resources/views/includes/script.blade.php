<script src="{{ asset('Template/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('Template/assets/js/app.js') }}"></script>

<script src="{{ asset('Template/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('Template/assets/js/pages/simple-datatables.js') }}"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<script>
    // Script for search bar
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

    // Script for delete alert
    function confirmDelete(facultyId) {
            // Show the delete confirmation dialog using the built-in window.confirm() method
            var result = confirm("Are you sure you want to delete this faculty?");

            // If the user clicks "OK" in the confirmation dialog, proceed with the delete action
            if (result) {
                // Build the URL for the delete action using the facultyId
                var deleteUrl = "{{ route('admin.facultydelete', ':facultyId') }}";
                deleteUrl = deleteUrl.replace(':facultyId', facultyId);

                // Create a hidden form to perform the delete action via POST method
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;
                form.style.display = 'none';

                // Add CSRF token to the form (if you're using CSRF protection)
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var csrfInput = document.createElement('input');
                csrfInput.setAttribute('type', 'hidden');
                csrfInput.setAttribute('name', '_token');
                csrfInput.setAttribute('value', csrfToken);
                form.appendChild(csrfInput);

                // Add a method override input to support DELETE method
                var methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'DELETE');
                form.appendChild(methodInput);

                // Append the form to the document body and submit it
                document.body.appendChild(form);
                form.submit();
            }

            // Return false to prevent the link from being followed if the user clicks "Cancel"
            return false;
        }
</script>
