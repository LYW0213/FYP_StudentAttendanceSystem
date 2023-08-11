<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance List</title>

    @include('includes.style')
</head>

<body>
    <div id="app">
        {{-- Sidebar --}}
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2" id="toggle-dark">
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                @include('includes.sidebar_subjectlist')

            </div>
        </div>

        {{-- Content --}}
        <div id="main">
            <div id="print-content">
                @if (auth::user()->roles_id == 1)
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    class="bi bi-people-fill" viewBox="0 0 16 16"
                                                    style="width: 35px; height: 35px;">
                                                    <path
                                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                                </svg>

                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h5 class="text-muted font-semibold">
                                                Total Student
                                            </h5>
                                            <h5 class="font-extrabold mb-0">{{ $attendanceCount }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon present mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    class="bi bi-person-check-fill" viewBox="0 0 16 16"
                                                    style="width: 35px; height: 35px;">
                                                    <path fill-rule="evenodd"
                                                        d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path
                                                        d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h5 class="text-muted font-semibold">Total Present</h5>

                                            <h5 class="font-extrabold mb-0">{{ $countPresent }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon absent mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    class="bi bi-person-x" viewBox="0 0 16 16"
                                                    style="width: 35px; height: 35px;">
                                                    <path
                                                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                                    <path
                                                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h5 class="text-muted font-semibold">Total Absent</h5>
                                            <h5 class="font-extrabold mb-0">{{ $countAbsent }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon late mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    class="bi bi-person-exclamation" viewBox="0 0 16 16"
                                                    style="width: 35px; height: 35px;">
                                                    <path
                                                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                                    <path
                                                        d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5Zm0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h5 class="text-muted font-semibold">Total Late</h5>
                                            <h5 class="font-extrabold mb-0">{{ $countLate }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (auth::user()->roles_id == 2)
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    class="bi bi-people-fill" viewBox="0 0 16 16"
                                                    style="width: 35px; height: 35px;">
                                                    <path
                                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                                </svg>

                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h5 class="text-muted font-semibold">
                                                Total Student
                                            </h5>
                                            <h5 class="font-extrabold mb-0">{{ $attendanceCount }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon present mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    class="bi bi-person-check-fill" viewBox="0 0 16 16"
                                                    style="width: 35px; height: 35px;">
                                                    <path fill-rule="evenodd"
                                                        d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path
                                                        d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h5 class="text-muted font-semibold">Total Present</h5>

                                            <h5 class="font-extrabold mb-0">{{ $countPresent }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon absent mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    class="bi bi-person-x" viewBox="0 0 16 16"
                                                    style="width: 35px; height: 35px;">
                                                    <path
                                                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                                    <path
                                                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h5 class="text-muted font-semibold">Total Absent</h5>
                                            <h5 class="font-extrabold mb-0">{{ $countAbsent }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon late mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    class="bi bi-person-exclamation" viewBox="0 0 16 16"
                                                    style="width: 35px; height: 35px;">
                                                    <path
                                                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                                    <path
                                                        d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5Zm0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h5 class="text-muted font-semibold">Total Late</h5>
                                            <h5 class="font-extrabold mb-0">{{ $countLate }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                @if (session()->has('status'))
                    @if (session('status') == 'success')
                        <div class="alert alert-light-success color-success">
                            <div class="success-message">
                                <i class="bi bi-check-circle"></i> {{ session('message') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @elseif (session('status') == 'Error')
                        <div class="alert alert-light-danger color-danger">
                            <i class="bi bi-check-circle"></i> {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                @endif
                <div class="page-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>{{ $class->subject->subjectCode }} - {{ $class->subject->subjectName }}</h2>
                            <h2>{{ $class->name }} Attendance List</h2>
                        </div>
                        @if (Auth::user()->roles_id == 1)
                            <div class="col-md-6 text-end">
                                <button
                                    class="btn btn-primary custom-print-button"onclick="printContent()">Print</button>
                            </div>
                        @elseif (Auth::user()->roles_id == 2)
                            <div class="col-md-6 text-end">
                                <button class="btn btn-primary hidden-print"onclick="printContent()">Print</button>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-md-6 col-12 search-margin-attendance">
                    <div class="dataTable-search">
                        <input id="searchAttendance" class="dataTable-input" placeholder="Search..." type="text">
                    </div>
                </div>

                {{-- Table --}}
                <div class="table-responsive">
                    <div class="table table-hover brd" id="">
                        <table class="table table-hover bdr">

                            {{-- Head of Table --}}
                            <thead class="bg-blue">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            {{-- Body of Table --}}
                            <tbody class="bg-white">
                                <?php
                                $num = 1;
                                ?>
                                @foreach ($class->attendances as $attendance)
                                    {{-- Present --}}
                                    <tr>
                                        <td class="text-bold-700">{{ $num }}</td>
                                        <?php
                                        $num++;
                                        ?>
                                        <td>{{ $attendance->user->student->studentId }}</td>
                                        <td>{{ $attendance->user->name }}</td>
                                        <td>{{ $attendance->user->student->course->name }}</td>
                                        <td>{{ $attendance->created_at }}</td>
                                        <td>
                                            @if ($attendance->statuses_id == 1)
                                                <span class="badge bg-success">{{ $attendance->status->name }}</span>
                                            @elseif ($attendance->statuses_id == 2)
                                                <span class="badge bg-danger">{{ $attendance->status->name }}</span>
                                            @elseif ($attendance->statuses_id == 3)
                                                <span class="badge bg-end">{{ $attendance->status->name }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination --}}
                        <div class="table-responsive dataTable-bottom">
                            <nav class="dataTable-pagination">
                                <ul class="dataTable-pagination-list pagination pagination-primary">
                                    {{ $attendances->links('pagination::bootstrap-4') }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        const searchInput = document.getElementById('searchAttendance');

        // Add an event listener for the input event
        searchInput.addEventListener('input', function(event) {
            const searchText = event.target.value.toLowerCase();
            const rows = document.querySelectorAll('.bg-white tr');

            // Iterate over each row and check if it matches the search text
            rows.forEach(function(row) {
                const studentId = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const studentName = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const course = row.querySelector('td:nth-child(5)').textContent.toLowerCase();

                // Show or hide the row based on the search text
                if (studentId.includes(searchText) || studentName.includes(searchText) || course.includes(
                        searchText)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    @include('includes.script')
</body>
<script>
    function printContent() {
        var printContents = document.getElementById("print-content").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

</html>
