<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Programs List</title>

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
                @include('includes.sidebar_facultylist')
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h2>Programs List</h2>
            </div>

            <div class="page-content">
                <section class="section">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                @if ($errors->any())
                                    <div class="alert alert-light-danger color-danger">
                                        <i class="bi bi-exclamation-circle"></i> Error:
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session()->has('success'))
                                    <div class="alert alert-light-success color-success">
                                        <div class="success-message">
                                            <i class="bi bi-check-circle"></i> {{ session('success') }}
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="buttons" style="text-align: right;">
                                    <a class="btn btn-primary bg-blue" data-bs-toggle="modal"
                                        data-bs-target="#AddProgram">Add New</a>
                                </div>
                            </div>
                            <div class="modal fade text-left" id="AddProgram" tabindex="-1"
                                aria-labelledby="AddProgram" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="AddProgram">
                                                Add Programs
                                            </h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                    </line>
                                                </svg>
                                            </button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.programcreate') }}">
                                            @csrf
                                            @method('post')
                                            <div class="modal-body">
                                                <label for="text">Program Name: </label>
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Program name"
                                                        class="form-control">
                                                </div>
                                                <label>Faculty:</label>
                                                <div class="form-group">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="faculty_id">
                                                        <option value="" selected disabled>Select a Faculty
                                                        </option>
                                                        @foreach ($faculties as $faculty)
                                                            <option value="{{ $faculty->id }}">{{ $faculty->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <label for="textarea">Description: </label>
                                                <div class="form-group">
                                                    <textarea type="textarea" name="description" class="form-control" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary bg-blue ms-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">ADD</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            <!-- Table with outer spacing -->
            <div class="table-responsive">
                <table class="table table-hover bdr">
                    <thead class="bg-blue">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Faculty</th>
                            <th scope="col">Programs</th>
                            <th scope="col">Description</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php
                        $num = 1;
                        ?>
                        @foreach ($courses as $course)
                            <tr>
                                <td class="text-bold-700">{{ $num }}</td>
                                <?php
                                $num++;
                                ?>
                                <td class="text-bold-500">{{ $course->faculty->name }}</td>
                                <td class="text-bold-500">{{ $course->name }}</td>
                                <td>{{ $course->description }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="mr-2" data-bs-toggle="modal"
                                            data-bs-target="#EditFaculty{{ $course->id }} ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-pencil-square"
                                                viewBox="0 0 16 16" style="width: 30px; height: 30px; fill: #00024a;">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade text-left" id="EditFaculty{{ $course->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">Edit
                                                            Program</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('admin.programedit', ['program' => $course->id]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <label>Program Name:</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    name="name" value="{{ $course->name }}">
                                                            </div>

                                                            <label>Faculty:</label>
                                                            <div class="form-group">
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="faculty_id">
                                                                    <option value="">Select a Faculty</option>
                                                                    @foreach ($faculties as $faculty)
                                                                        <option
                                                                            @if ($course->faculties_id == $faculty->id) selected @endif
                                                                            value="{{ $faculty->id }}">
                                                                            {{ $faculty->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <label>Description:</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ $course->description }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="submit"
                                                                class="btn btn-primary bg-blue ms-1">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">SAVE</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="mr-2"
                                            onclick="return confirmDelete1({{ $course->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-trash3"
                                                viewBox="0 0 16 16" style="width: 29px; height: 29px; fill: red;">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-responsive dataTable-bottom">
                <nav class="dataTable-pagination">
                    <ul class="dataTable-pagination-list pagination pagination-primary">
                        {{ $courses->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    @include('includes.script')

</body>

</html>
