<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>

    @include('includes.style')

</head>

<body>
    <div id="app">
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
                @include('includes.sidebar_userlist')
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h2>Student List</h2>
            </div>

            <div class="page-content">
                <section class="section">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 col-12 search-margin-bottom">
                                <div class="dataTable-search">
                                    <input id="searchInput" class="dataTable-input" placeholder="Search..."
                                        type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="buttons" style="text-align: right;">
                                    <a href="{{ route('admin.student_create') }}" class="btn btn-primary bg-blue">Add
                                        new users</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-hover bdr">
                            <thead class="bg-blue">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Faculty</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($users as $user)
                                    @if ($user->roles_id === 3)
                                        <tr>
                                            <td class="text-bold-700">1</td>
                                            <td class="text-bold-500">
                                                @if ($user->student)
                                                    {{ $user->student->studentId }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="text-bold-500">{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-bold-500">{{ $user->faculty->name }}</td>
                                            <td class="text-bold-500">
                                                @if ($user->student)
                                                    {{ $user->student->course->name }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.student_edit') }}" class="mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="bi bi-pencil-square" viewBox="0 0 16 16"
                                                            style="width: 30px; height: 30px; fill: currentColor;">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                    <a href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-trash3"
                                                            viewBox="0 0 16 16"
                                                            style="width: 29px; height: 29px; fill: red;">
                                                            <path
                                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive dataTable-bottom">
                        <nav class="dataTable-pagination">
                            <ul class="dataTable-pagination-list pagination pagination-primary">
                                <li class="active page-item"><a href="#" data-page="1" class="page-link">1</a>
                                </li>
                                <li class="page-item"><a href="#" data-page="2" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" data-page="3" class="page-link">3</a></li>
                                <li class="pager page-item"><a href="#" data-page="2" class="page-link">›</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
            </div>
        </div>
        </section>
    </div>
    @include('includes.script')

</body>

</html>
