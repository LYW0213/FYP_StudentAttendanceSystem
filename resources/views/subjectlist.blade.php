<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            <div class="page-content">
                <div class="col-12">
                    <div class="row">
                        {{-- Search Bar --}}
                        <div class="col-md-6 col-12 search-margin-bottom">
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
                                        <form action="#">

                                            <div class="modal-body">

                                                {{-- Subject Code --}}
                                                <label for="text">Subject Code: </label>
                                                <div class="form-group">
                                                    <input id="text" type="text" placeholder="Subject Code"
                                                        class="form-control">
                                                </div>
                                                {{-- Subject Name --}}
                                                <label for="text">Subject Name: </label>
                                                <div class="form-group">
                                                    <input id="text" type="text" placeholder="Subject name"
                                                        class="form-control">
                                                </div>
                                                {{-- Faculty Name(drop down) --}}
                                                <label for="text">Faculty Name: </label>
                                                <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    style="width: 70%; background-color: #ffffff; border: 1px solid #dce7f1; color:#747d86">
                                                    Faculty Name
                                                </button>
                                                <div class="mx-4 form-group dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Option 1</a>
                                                    <a class="dropdown-item" href="#">Option 2</a>
                                                    <a class="dropdown-item" href="#">Option 3</a>
                                                </div>
                                                {{-- Lecturer Name --}}
                                                <label for="text">Lecturer Name: </label>
                                                <div class="form-group">
                                                    <input id="text" type="text" placeholder="Lecturer name"
                                                        class="form-control">
                                                </div>

                                            </div>

                                            {{-- Close & Save --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-primary bg-blue ms-1"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">SAVE</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->roles_id == 2)
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
                                        <form action="#">

                                            <div class="modal-body">

                                                {{-- Subject Code --}}
                                                <label for="text">Subject Code: </label>
                                                <div class="form-group">
                                                    <input id="text" type="text" placeholder="Subject Code"
                                                        class="form-control">
                                                </div>
                                                {{-- Subject Name --}}
                                                <label for="text">Subject Name: </label>
                                                <div class="form-group">
                                                    <input id="text" type="text" placeholder="Subject name"
                                                        class="form-control">
                                                </div>
                                                {{-- Faculty Name(drop down) --}}
                                                <label for="text">Faculty Name: </label>
                                                <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    style="width: 70%; background-color: #ffffff; border: 1px solid #dce7f1; color:#747d86">
                                                    Faculty Name
                                                </button>
                                                <div class="mx-4 form-group dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Option 1</a>
                                                    <a class="dropdown-item" href="#">Option 2</a>
                                                    <a class="dropdown-item" href="#">Option 3</a>
                                                </div>
                                                {{-- Lecturer Name --}}
                                                <label for="text">Lecturer Name: </label>
                                                <div class="form-group">
                                                    <input id="text" type="text" placeholder="Lecturer name"
                                                        class="form-control">
                                                </div>

                                            </div>

                                            {{-- Close & Save --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-primary bg-blue ms-1"
                                                    data-bs-dismiss="modal">
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
                        @foreach ($subjects as $subject)
                            <tr>
                                <td class="text-bold-500">{{ $subject->id }}</td>
                                <td>{{ $subject->faculty->name }}</td>
                                <td>{{ $subject->subjectCode }}</td>
                                <td>{{ $subject->subjectName }}</td>
                                <td>{{ $subject->user->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        @if (auth::user()->roles_id == 1)
                                        <a href="{{ route('admin.classeslist') }}">
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
                                    @elseif (auth::user()->roles_id == 2)
                                        <a href="{{ route('lecturer.classeslist') }}">
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
                                    @else
                                        <a href="{{ route('classeslist') }}">
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
                                    @endif


                                    {{-- View Icon --}}
                                    @if (auth::user()->roles_id == 1)
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                class="bi bi-trash3" viewBox="0 0 16 16"
                                                style="width: 29px; height: 29px; fill: red;">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-responsive dataTable-bottom">
                <nav class="dataTable-pagination">
                    <ul class="dataTable-pagination-list pagination pagination-primary">
                        <li class="active page-item"><a href="#" data-page="1" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" data-page="2" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" data-page="3" class="page-link">3</a></li>
                        <li class="pager page-item"><a href="#" data-page="2" class="page-link">›</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @include('includes.script')
</body>

</html>
