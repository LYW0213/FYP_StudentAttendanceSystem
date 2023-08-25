<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Subject List</title>

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
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h2>Subject List</h2>
            </div>

            @if ($errors->any())
                <div class="alert alert-light-danger color-danger">
                    <i class="bi bi-exclamation-circle"></i> Error:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-light-success color-success">
                    <div class="success-message">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="page-content">
                <div class="col-12">
                    <div class="row">
                        {{-- Search Bar --}}
                        <div class="col-md-6 col-12 search-margin-subject">
                            <div class="dataTable-search">
                                <input id="searchInput" class="dataTable-input" placeholder="Search..." type="text">
                            </div>
                        </div>

                        {{-- add new button show when roles id 1/2 --}}
                        @if (Auth::user()->roles_id == 1)
                            {{-- Add New Button --}}
                            <div class="col-md-6 col-12">
                                <div class="buttons" style="text-align: right;">
                                    <a class="btn btn-primary bg-blue" data-bs-toggle="modal"
                                        data-bs-target="#NewSubjectForm">Add New</a>
                                </div>
                            </div>
                            {{-- Add New Button Popup --}}
                            <div class="modal fade text-left" id="NewSubjectForm" tabindex="-1"
                                aria-labelledby="NewSubjectModal" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="NewSubjectModal">
                                                Add Subject
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
                                        {{-- Input Text --}}
                                        <form method="POST" action="{{ route('subjectcreate') }}">
                                            @csrf
                                            @method('post')
                                            <div class="modal-body">
                                                {{-- Subject Code --}}
                                                <label for="subjectCode">Subject Code: </label>
                                                <div class="form-group">
                                                    <input id="subjectCode" type="text" placeholder="Subject Code"
                                                        class="form-control" name="subjectCode">
                                                </div>
                                                {{-- Subject Name --}}
                                                <label for="subjectName">Subject Name: </label>
                                                <div class="form-group">
                                                    <input id="subjectName" type="text" placeholder="Subject name"
                                                        class="form-control" name="subjectName">
                                                </div>
                                                {{-- Faculty --}}
                                                <label for="faculty_id">Faculty:</label>
                                                <div class="form-group">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="faculty_id" id="faculty_id">
                                                        <option value="" selected disabled>Select a Faculty
                                                        </option>
                                                        @foreach ($faculties as $faculty)
                                                            <option value="{{ $faculty->id }}">{{ $faculty->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- Course --}}
                                                <label for="course_id">Course:</label>
                                                <div class="form-group">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="course_id" id="course_id">
                                                        <option value="" selected disabled>Select a Course
                                                        </option>
                                                        @foreach ($courses as $course)
                                                            <option value="{{ $course->id }}">{{ $course->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- Lecturer Name --}}
                                                <label for="lecturerName">Lecturer Name: </label>
                                                <div class="form-group">
                                                    <input id="lecturerName" type="text"
                                                        placeholder="Lecturer name" class="form-control"
                                                        name="users_id" value="{{ Auth::user()->name }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Close & Save --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary bg-blue ms-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">SAVE</span>
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @elseif (Auth::user()->roles_id == 2)
                            {{-- Add New Button --}}
                            <div class="col-md-6 col-12">
                                <div class="buttons" style="text-align: right;">
                                    <a class="btn btn-primary bg-blue" data-bs-toggle="modal"
                                        data-bs-target="#NewSubjectForm">Add New</a>
                                </div>
                            </div>
                            {{-- Add New Button Popup --}}
                            <div class="modal fade text-left" id="NewSubjectForm" tabindex="-1"
                                aria-labelledby="NewSubjectModal" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="NewSubjectModal">
                                                Add Subject
                                            </h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6"
                                                        y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18"
                                                        y2="18">
                                                    </line>
                                                </svg>
                                            </button>
                                        </div>
                                        {{-- Input Text --}}
                                        <form method="POST" action="{{ route('subjectcreate') }}">
                                            @csrf
                                            @method('post')
                                            <div class="modal-body">
                                                {{-- Subject Code --}}
                                                <label for="subjectCode">Subject Code: </label>
                                                <div class="form-group">
                                                    <input id="subjectCode" type="text" placeholder="Subject Code"
                                                        class="form-control" name="subjectCode">
                                                </div>
                                                {{-- Subject Name --}}
                                                <label for="subjectName">Subject Name: </label>
                                                <div class="form-group">
                                                    <input id="subjectName" type="text" placeholder="Subject name"
                                                        class="form-control" name="subjectName">
                                                </div>
                                                {{-- Faculty --}}
                                                <label for="faculty_id">Faculty:</label>
                                                <div class="form-group">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="faculty_id" id="faculty_id">
                                                        <option value="" selected disabled>Select a Faculty
                                                        </option>
                                                        @foreach ($faculties as $faculty)
                                                            <option value="{{ $faculty->id }}">{{ $faculty->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- Course --}}
                                                <label for="course_id">Course:</label>
                                                <div class="form-group">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="course_id" id="course_id">
                                                        <option value="" selected disabled>Select a Course
                                                        </option>
                                                        @foreach ($courses as $course)
                                                            <option value="{{ $course->id }}">{{ $course->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- Lecturer Name --}}
                                                <label for="lecturerName">Lecturer Name: </label>
                                                <div class="form-group">
                                                    <input id="lecturerName" type="text"
                                                        placeholder="Lecturer name" class="form-control"
                                                        name="users_id" value="{{ Auth::user()->name }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Close & Save --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary bg-blue ms-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">SAVE</span>
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-hover bdr">
                    <thead class="bg-blue">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Faculty</th>
                            <th scope="col">Subject Code</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Lecturer Name</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php
                        $num = 1;
                        ?>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td class="text-bold-700">{{ $num }}</td>
                                <?php
                                $num++;
                                ?>
                                <td>{{ $subject->faculty->name }}</td>
                                <td>{{ $subject->subjectCode }}</td>
                                <td>{{ $subject->subjectName }}</td>
                                <td>{{ $subject->user->name }}</td>
                                <td>
                                    <div class="d-flex">
                                            <a href="{{ route('classeslist', ['subject' => $subject]) }}">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 512 512"
                                                    style="enable-background:new 0 0 512 512; width: 28px; height: 28px;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M359.3,138.6v-28.2c0-2.6-2.1-4.7-4.7-4.7H129.2c-2.6,0-4.7,2.1-4.7,4.7v28.2c0,2.6,2.1,4.7,4.7,4.7h225.5
                                                C357.2,143.3,359.3,141.2,359.3,138.6z M129.2,190.2c-2.6,0-4.7,2.1-4.7,4.7v28.2c0,2.6,2.1,4.7,4.7,4.7h108c2.6,0,4.7-2.1,4.7-4.7
                                                v-28.2c0-2.6-2.1-4.7-4.7-4.7H129.2z M213.7,455.6H77.5V42.3h328.8v202c0,2.6,2.1,4.7,4.7,4.7h32.9c2.6,0,4.7-2.1,4.7-4.7V18.8
                                                c0-10.4-8.4-18.8-18.8-18.8H54C43.6,0,35.2,8.4,35.2,18.8v460.3c0,10.4,8.4,18.8,18.8,18.8h159.7c2.6,0,4.7-2.1,4.7-4.7v-32.9
                                                C218.4,457.7,216.3,455.6,213.7,455.6z M475.4,485.9l-54.8-54.8c13.1-17.3,20.9-38.9,20.9-62.4c0-57.1-46.3-103.3-103.3-103.3
                                                s-103.3,46.3-103.3,103.3s46.3,103.3,103.3,103.3c21,0,40.5-6.3,56.8-17l55.6,55.6c0.9,0.9,2.1,1.4,3.3,1.4s2.4-0.5,3.3-1.4
                                                l18.2-18.2C477.2,490.6,477.2,487.7,475.4,485.9L475.4,485.9z M338.2,434.5c-36.3,0-65.8-29.4-65.8-65.8s29.4-65.8,65.8-65.8
                                                c36.3,0,65.8,29.4,65.8,65.8S374.5,434.5,338.2,434.5z" />
                                                    </g>
                                                </svg>
                                            </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-responsive dataTable-bottom">
                <nav class="dataTable-pagination">
                    <ul class="dataTable-pagination-list pagination pagination-primary">
                        {{ $subjects->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @include('includes.script')
</body>

</html>
