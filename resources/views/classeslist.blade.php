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
                <h2>Classes Code + Name</h2>
            </div>

            <div class="page-content">
                <div class="col-12">
                    <div class="row">
                        {{-- Add New Button --}}
                        {{-- Admin --}}
                        @if (Auth::user()->roles_id == 1)
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
                                                Add Classes
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

                                                {{-- Title Code --}}
                                                <label for="text">Title: </label>
                                                <div class="form-group">
                                                    <input id="text" type="text" placeholder="Title"
                                                        class="form-control">
                                                </div>
                                                {{-- Venue --}}
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <label for="text">Venue: </label>
                                                        <div class="btn-group dropdown">
                                                            <button class="btn btn-primary dropdown-toggle me-1"
                                                                type="button" id="dropdownMenuButton"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"
                                                                style="width: 100%; background-color: #ffffff; border: 1px solid #dce7f1; color:#747d86">
                                                                Faculty
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Option 1</a>
                                                                <a class="dropdown-item" href="#">Option 2</a>
                                                                <a class="dropdown-item" href="#">Option 3</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Date --}}
                                                <label for="text">Date: </label>
                                                <div class="form-group">
                                                    <input id="day" type="date"
                                                        class="day form-control shadow-none rounded-0" name="day">
                                                    <small class="day_error fs-5 text-danger"></small>
                                                </div>
                                                {{-- Time --}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="date">Start Time</label>
                                                        <input id="start" type="time"
                                                            class="start form-control shadow-none rounded-0"
                                                            name="start">
                                                        <small class="start_error fs-6 text-danger"></small>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="time">End Time</label>
                                                        <input id="end" type="time"
                                                            class="end form-control shadow-none rounded-0"
                                                            name="end">
                                                        <small class="end_error fs-6 text-danger"></small>
                                                    </div>
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


                        {{-- Lecturer --}}
                        @if (Auth::user()->roles_id == 2)
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
                                                Add Classes
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

                                                {{-- Title Code --}}
                                                <label for="text">Title: </label>
                                                <div class="form-group">
                                                    <input id="text" type="text" placeholder="Title"
                                                        class="form-control">
                                                </div>
                                                {{-- Venue --}}
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <label for="text">Venue: </label>
                                                        <div class="btn-group dropdown">
                                                            <button class="btn btn-primary dropdown-toggle me-1"
                                                                type="button" id="dropdownMenuButton"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"
                                                                style="width: 100%; background-color: #ffffff; border: 1px solid #dce7f1; color:#747d86">
                                                                Faculty
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Option 1</a>
                                                                <a class="dropdown-item" href="#">Option 2</a>
                                                                <a class="dropdown-item" href="#">Option 3</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Date --}}
                                                <label for="text">Date: </label>
                                                <div class="form-group">
                                                    <input id="day" type="date"
                                                        class="day form-control shadow-none rounded-0" name="day">
                                                    <small class="day_error fs-5 text-danger"></small>
                                                </div>
                                                {{-- Time --}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="date">Start Time</label>
                                                        <input id="start" type="time"
                                                            class="start form-control shadow-none rounded-0"
                                                            name="start">
                                                        <small class="start_error fs-6 text-danger"></small>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="time">End Time</label>
                                                        <input id="end" type="time"
                                                            class="end form-control shadow-none rounded-0"
                                                            name="end">
                                                        <small class="end_error fs-6 text-danger"></small>
                                                    </div>
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
                            <th scope="col">Title</th>
                            <th scope="col">Venue</th>
                            <th scope="col">Date</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    {{-- Body of Table --}}
                    <tbody class="bg-white">
                        <tr>
                            <td class="text-bold-500">1</td>
                            <td>Week 1 (Lecturer)</td>
                            <td>B106</td>
                            <td>11-2-2023</td>
                            <td>12:00</td>
                            <td>13:00</td>
                            <td>
                                <span class="badge bg-end">End</span>
                            </td>
                            <td>
                                {{-- QRCode Icon --}}
                                {{-- Admin --}}
                                @if (auth::user()->roles_id == 1)
                                    <a href="{{ route('classeslist') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-qr-code"
                                            viewBox="0 0 16 16" style="width: 24px; height: 24px; fill: black;">
                                            <path d="M2 2h2v2H2V2Z" />
                                            <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z" />
                                            <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z" />
                                            <path
                                                d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z" />
                                            <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z" />
                                        </svg>
                                    </a>
                                @endif

                                {{-- Lecturer --}}
                                @if (auth::user()->roles_id == 2)
                                    <a href="{{ route('classeslist') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-qr-code"
                                            viewBox="0 0 16 16" style="width: 24px; height: 24px; fill: black;">
                                            <path d="M2 2h2v2H2V2Z" />
                                            <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z" />
                                            <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z" />
                                            <path
                                                d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z" />
                                            <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z" />
                                        </svg>
                                    </a>
                                @endif

                                {{-- View Icon --}}
                                {{-- Admin --}}
                                @if (auth::user()->roles_id == 1)
                                    <a href="{{ route('attendancelist') }}">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512 512"
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
                                    {{-- Lecturer --}}
                                @elseif (auth::user()->roles_id == 2)
                                    <a href="{{ route('attendancelist') }}">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512 512"
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

                                    {{-- student --}}
                                @else
                                    <a href="{{ route('student.attendance') }}">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512 512"
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

                                @if (auth::user()->roles_id == 1)
                                    {{-- Delete Icon --}}
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="bi bi-trash3"
                                            viewBox="0 0 16 16" style="width: 29px; height: 29px; fill: red;">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg></a>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td class="text-bold-500">1</td>
                            <td>Week 2 (Lecturer)</td>
                            <td>B106</td>
                            <td>21-2-2023</td>
                            <td>12:00</td>
                            <td>13:00</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>

                                {{-- QRCode Icon --}}
                                {{-- Admin --}}
                                @if (auth::user()->roles_id == 1)
                                    <a href="{{ route('classeslist') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-qr-code"
                                            viewBox="0 0 16 16" style="width: 24px; height: 24px; fill: black;">
                                            <path d="M2 2h2v2H2V2Z" />
                                            <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z" />
                                            <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z" />
                                            <path
                                                d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z" />
                                            <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z" />
                                        </svg>
                                    </a>
                                @endif

                                {{-- Lecturer --}}
                                @if (auth::user()->roles_id == 2)
                                    <a href="{{ route('classeslist') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-qr-code"
                                            viewBox="0 0 16 16" style="width: 24px; height: 24px; fill: black;">
                                            <path d="M2 2h2v2H2V2Z" />
                                            <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z" />
                                            <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z" />
                                            <path
                                                d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z" />
                                            <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z" />
                                        </svg>
                                    </a>
                                @endif

                                {{-- View Icon --}}
                                {{-- Admin --}}
                                @if (auth::user()->roles_id == 1)
                                    <a href="{{ route('attendancelist') }}">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512 512"
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
                                    {{-- Lecturer --}}
                                @elseif (auth::user()->roles_id == 2)
                                    <a href="{{ route('attendancelist') }}">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512 512"
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

                                    {{-- student --}}
                                @else
                                    <a href="{{ route('student.attendance') }}">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512 512"
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
                                @if (auth::user()->roles_id == 1)
                                    {{-- Delete Icon --}}
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="bi bi-trash3"
                                            viewBox="0 0 16 16" style="width: 29px; height: 29px; fill: red;">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg></a>
                                @endif
                            </td>
                        </tr>

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
